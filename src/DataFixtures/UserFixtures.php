<?php

namespace App\DataFixtures;

use App\Entity\ClientProfile;
use App\Entity\NotificationPreference;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public const CLIENT_REFERENCE_PREFIX = 'client_user_';
    public const PRO_REFERENCE_PREFIX = 'pro_user_';
    public const STAFF_REFERENCE_PREFIX = 'staff_user_';

    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $locales = array_column(LocaleFixtures::EU_LOCALES, 'code');
        $countries = ['FR', 'BE', 'DE', 'ES', 'IT', 'PT', 'NL', 'PL', 'SE', 'DK', 'IE', 'AT', 'GB', 'CH', 'NO', 'FI'];

        $timezoneByCountry = [
            'FR' => 'Europe/Paris', 'BE' => 'Europe/Brussels', 'DE' => 'Europe/Berlin',
            'ES' => 'Europe/Madrid', 'IT' => 'Europe/Rome', 'PT' => 'Europe/Lisbon',
            'NL' => 'Europe/Amsterdam', 'PL' => 'Europe/Warsaw', 'SE' => 'Europe/Stockholm',
            'DK' => 'Europe/Copenhagen', 'IE' => 'Europe/Dublin', 'AT' => 'Europe/Vienna',
            'GB' => 'Europe/London', 'CH' => 'Europe/Zurich', 'NO' => 'Europe/Oslo',
            'FI' => 'Europe/Helsinki',
        ];

        for ($i = 1; $i <= 60; $i++) {
            $locale = $faker->randomElement($locales);
            $countryCode = $faker->randomElement($countries);

            $user = (new User())
                ->setPublicId($this->publicId())
                ->setEmail(sprintf('client%02d@example.test', $i))
                ->setPhone('+33 6 '.str_pad((string) $i, 2, '0', STR_PAD_LEFT).' 12 34 56')
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setType(User::TYPE_CLIENT)
                ->setLocale($locale)
                ->setCountryCode($countryCode)
                ->setTimezone($timezoneByCountry[$countryCode] ?? 'UTC')
                ->setRoles(['ROLE_USER'])
                ->setIsVerified(true)
                ->setIsPhoneVerified($i % 4 !== 0)
                ->setIsActive(true);

            $user->setPassword($this->passwordHasher->hashPassword($user, 'Password123!'));

            $clientProfile = (new ClientProfile())
                ->setUser($user)
                ->setDefaultCity($faker->city())
                ->setMarketingEmailConsent($i % 3 === 0)
                ->setMarketingSmsConsent($i % 5 === 0)
                ->setPhotoConsent($i % 6 === 0)
                ->setReliabilityScore($faker->numberBetween(70, 100))
                ->setNoShowCount($faker->numberBetween(0, 2));

            $notificationPreference = (new NotificationPreference())
                ->setUser($user)
                ->setAppointmentEmail(true)
                ->setAppointmentSms(true)
                ->setMarketingEmail($i % 3 === 0)
                ->setMarketingSms($i % 5 === 0)
                ->setProDailyDigest(false);

            $manager->persist($user);
            $manager->persist($clientProfile);
            $manager->persist($notificationPreference);

            $this->addReference(self::CLIENT_REFERENCE_PREFIX.$i, $user);
        }

        for ($i = 1; $i <= 8; $i++) {
            $user = (new User())
                ->setPublicId($this->publicId())
                ->setEmail(sprintf('pro%02d@example.test', $i))
                ->setPhone('+33 7 '.str_pad((string) $i, 2, '0', STR_PAD_LEFT).' 98 76 54')
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setType(User::TYPE_PRO)
                ->setLocale('fr')
                ->setCountryCode('FR')
                ->setTimezone('Europe/Paris')
                ->setRoles(['ROLE_USER', 'ROLE_PRO'])
                ->setIsVerified(true)
                ->setIsPhoneVerified(true)
                ->setIsActive(true);

            $user->setPassword($this->passwordHasher->hashPassword($user, 'Password123!'));

            $manager->persist($user);
            $this->addReference(self::PRO_REFERENCE_PREFIX.$i, $user);
        }

        for ($i = 1; $i <= 18; $i++) {
            $user = (new User())
                ->setPublicId($this->publicId())
                ->setEmail(sprintf('staff%02d@example.test', $i))
                ->setPhone('+33 7 '.str_pad((string) $i, 2, '0', STR_PAD_LEFT).' 11 22 33')
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setType(User::TYPE_STAFF)
                ->setLocale('fr')
                ->setCountryCode('FR')
                ->setTimezone('Europe/Paris')
                ->setRoles(['ROLE_USER', 'ROLE_PRO'])
                ->setIsVerified(true)
                ->setIsPhoneVerified(true)
                ->setIsActive(true);

            $user->setPassword($this->passwordHasher->hashPassword($user, 'Password123!'));

            $manager->persist($user);
            $this->addReference(self::STAFF_REFERENCE_PREFIX.$i, $user);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LocaleFixtures::class,
            CountryCurrencyFixtures::class,
        ];
    }

    private function publicId(): string
    {
        return strtoupper(substr(bin2hex(random_bytes(13)), 0, 26));
    }
}
