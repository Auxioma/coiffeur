<?php

namespace App\DataFixtures;

use App\Entity\ResetPasswordRequest;
use App\Entity\User;
use App\Entity\UserSecurityToken;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

final class SecurityFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            /** @var User $client */
            $client = $this->getReference(
                UserFixtures::CLIENT_REFERENCE_PREFIX.$i,
                User::class
            );

            $emailToken = (new UserSecurityToken())
                ->setUser($client)
                ->setTokenHash(hash('sha256', 'email-verification-client-'.$i))
                ->setTokenType('email_verification')
                ->setDestination($client->getEmail())
                ->setExpiresAt(new \DateTimeImmutable('+48 hours'))
                ->setConsumedAt($i <= 5 ? new \DateTimeImmutable('-1 day') : null);

            $phoneToken = (new UserSecurityToken())
                ->setUser($client)
                ->setTokenHash(hash('sha256', 'phone-otp-client-'.$i))
                ->setTokenType('phone_otp')
                ->setDestination($client->getPhone())
                ->setExpiresAt(new \DateTimeImmutable('+15 minutes'))
                ->setConsumedAt($i <= 3 ? new \DateTimeImmutable('-10 minutes') : null);

            /**
             * IMPORTANT :
             * bin2hex(random_bytes(10)) = 20 caractères
             * Cela évite l'erreur :
             * "valeur trop longue pour le type character varying(20)"
             */
            $selector = bin2hex(random_bytes(10));

            /**
             * hash('sha256') = 64 caractères
             * La colonne hashedToken doit donc faire au moins VARCHAR(64)
             */
            $hashedToken = hash('sha256', 'reset-password-client-'.$i);

            $resetPassword = new ResetPasswordRequest(
                $client,
                new \DateTimeImmutable('+1 hour'),
                $selector,
                $hashedToken
            );

            $manager->persist($emailToken);
            $manager->persist($phoneToken);
            $manager->persist($resetPassword);
        }

        for ($i = 1; $i <= 3; $i++) {
            /** @var User $pro */
            $pro = $this->getReference(
                UserFixtures::PRO_REFERENCE_PREFIX.$i,
                User::class
            );

            $magicLink = (new UserSecurityToken())
                ->setUser($pro)
                ->setTokenHash(hash('sha256', 'magic-link-pro-'.$i))
                ->setTokenType('magic_link')
                ->setDestination($pro->getEmail())
                ->setExpiresAt(new \DateTimeImmutable('+30 minutes'))
                ->setConsumedAt(null);

            $manager->persist($magicLink);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
        ];
    }
}