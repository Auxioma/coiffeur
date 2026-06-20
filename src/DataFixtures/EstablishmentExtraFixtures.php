<?php

namespace App\DataFixtures;

use App\Entity\Establishment;
use App\Entity\EstablishmentSocialLink;
use App\Entity\ServicePackage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

final class EstablishmentExtraFixtures extends Fixture implements DependentFixtureInterface
{
    public const SERVICE_PACKAGE_REFERENCE_PREFIX = 'service_package_';

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $establishment = $this->getReference(ProfessionalDemoFixtures::ESTABLISHMENT_REFERENCE_PREFIX.$i, Establishment::class);

            foreach ([
                ['platform' => 'instagram', 'url' => 'https://instagram.com/demo_salon_'.$i],
                ['platform' => 'facebook', 'url' => 'https://facebook.com/demo.salon.'.$i],
            ] as $socialData) {
                $social = (new EstablishmentSocialLink())
                    ->setEstablishment($establishment)
                    ->setPlatform($socialData['platform'])
                    ->setUrl($socialData['url']);

                $manager->persist($social);
            }

            $package = (new ServicePackage())
                ->setEstablishment($establishment)
                ->setName('Forfait beauté signature')
                ->setSlug('forfait-beaute-signature')
                ->setDescription('Un forfait premium combinant plusieurs prestations populaires.')
                ->setTotalDurationMinutes(120)
                ->setPriceCents($i === 2 ? 99000 : 9900)
                ->setCurrency($i === 2 ? 'SEK' : 'EUR')
                ->setIsBookableOnline(true)
                ->setIsActive(true);

            $manager->persist($package);
            $this->addReference(self::SERVICE_PACKAGE_REFERENCE_PREFIX.$i, $package);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProfessionalDemoFixtures::class,
        ];
    }
}
