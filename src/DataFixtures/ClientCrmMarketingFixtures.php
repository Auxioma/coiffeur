<?php

namespace App\DataFixtures;

use App\Entity\Establishment;
use App\Entity\EstablishmentClient;
use App\Entity\FavoriteEstablishment;
use App\Entity\LoyaltyAccount;
use App\Entity\LoyaltyProgram;
use App\Entity\MarketingCampaign;
use App\Entity\PromoCode;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

final class ClientCrmMarketingFixtures extends Fixture implements DependentFixtureInterface
{
    public const LOYALTY_PROGRAM_REFERENCE_PREFIX = 'loyalty_program_';

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($establishmentNumber = 1; $establishmentNumber <= 5; $establishmentNumber++) {
            $establishment = $this->getReference(
                ProfessionalDemoFixtures::ESTABLISHMENT_REFERENCE_PREFIX.$establishmentNumber,
                Establishment::class
            );

            $promoWelcome = (new PromoCode())
                ->setEstablishment($establishment)
                ->setCode('WELCOME10')
                ->setLabel('Offre première visite')
                ->setDiscountType('percent')
                ->setDiscountValue(10)
                ->setValidFrom(new \DateTimeImmutable('-1 month'))
                ->setValidUntil(new \DateTimeImmutable('+3 months'))
                ->setMaxUses(500)
                ->setCurrentUses($faker->numberBetween(0, 80))
                ->setFirstVisitOnly(true)
                ->setIsActive(true);

            $promoLocal = (new PromoCode())
                ->setEstablishment($establishment)
                ->setCode('LOCAL15')
                ->setLabel('Offre locale')
                ->setDiscountType('fixed_amount')
                ->setDiscountValue(1500)
                ->setValidFrom(new \DateTimeImmutable('-2 weeks'))
                ->setValidUntil(new \DateTimeImmutable('+6 weeks'))
                ->setMaxUses(100)
                ->setCurrentUses($faker->numberBetween(0, 20))
                ->setFirstVisitOnly(false)
                ->setIsActive(true);

            $loyaltyProgram = (new LoyaltyProgram())
                ->setEstablishment($establishment)
                ->setName('Carte fidélité beauté')
                ->setRuleDescription('Une visite validée = 1 point. La 10e visite donne droit à une récompense.')
                ->setVisitsRequired(10)
                ->setRewardLabel('10e séance offerte')
                ->setIsActive(true);

            $campaign = (new MarketingCampaign())
                ->setEstablishment($establishment)
                ->setName('Relance clients VIP')
                ->setChannel('email')
                ->setSegment(['tags' => ['VIP'], 'last_visit_days_min' => 45])
                ->setStatus('scheduled')
                ->setScheduledAt(new \DateTimeImmutable('+3 days'))
                ->setSentAt(null);

            $manager->persist($promoWelcome);
            $manager->persist($promoLocal);
            $manager->persist($loyaltyProgram);
            $manager->persist($campaign);

            $this->addReference(self::LOYALTY_PROGRAM_REFERENCE_PREFIX.$establishmentNumber, $loyaltyProgram);

            for ($clientIndex = 1; $clientIndex <= 12; $clientIndex++) {
                $clientNumber = (($establishmentNumber - 1) * 12) + $clientIndex;
                $client = $this->getReference(UserFixtures::CLIENT_REFERENCE_PREFIX.$clientNumber, User::class);

                $establishmentClient = (new EstablishmentClient())
                    ->setEstablishment($establishment)
                    ->setClient($client)
                    ->setSource($clientIndex % 3 === 0 ? 'phone' : 'online')
                    ->setInternalNote($clientIndex % 4 === 0 ? 'Client fidèle, préfère les créneaux du matin.' : null)
                    ->setSensitiveNote($clientIndex % 7 === 0 ? 'Attention aux produits parfumés.' : null)
                    ->setAllergiesNote($clientIndex % 8 === 0 ? 'Allergie déclarée : latex.' : null)
                    ->setColorFormulaNote($clientIndex % 5 === 0 ? 'Formule couleur : base 7.1 + patine beige.' : null)
                    ->setTags($clientIndex % 4 === 0 ? ['VIP', 'à relancer'] : ['nouveau'])
                    ->setTotalSpentCents($faker->numberBetween(4500, 45000))
                    ->setAppointmentsCount($faker->numberBetween(1, 12))
                    ->setNoShowCount($clientIndex % 10 === 0 ? 1 : 0)
                    ->setLastVisitAt(new \DateTimeImmutable('-'.$faker->numberBetween(1, 90).' days'));

                $favorite = (new FavoriteEstablishment())
                    ->setUser($client)
                    ->setEstablishment($establishment);

                $loyaltyAccount = (new LoyaltyAccount())
                    ->setLoyaltyProgram($loyaltyProgram)
                    ->setClient($client)
                    ->setVisitsCount($faker->numberBetween(1, 9))
                    ->setRewardsAvailable($clientIndex % 9 === 0 ? 1 : 0);

                $manager->persist($establishmentClient);
                $manager->persist($favorite);
                $manager->persist($loyaltyAccount);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProfessionalDemoFixtures::class,
            UserFixtures::class,
        ];
    }
}
