<?php

namespace App\DataFixtures;

use App\Entity\SubscriptionPlan;
use App\Entity\SubscriptionPlanPrice;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class SubscriptionPlanFixtures extends Fixture
{
    public const PLAN_REFERENCE_PREFIX = 'subscription_plan_';
    public const PRICE_REFERENCE_PREFIX = 'subscription_price_';

    private const PLANS = [
        [
            'code' => 'starter',
            'name' => 'Starter',
            'description' => 'Pour un indépendant ou un petit salon qui démarre la réservation en ligne.',
            'maxEstablishments' => 1,
            'maxStaff' => 3,
            'maxMonthlyAppointments' => 150,
            'monthly' => 2900,
            'yearly' => 29000,
            'sms' => false,
            'marketing' => false,
            'multi' => false,
            'reports' => false,
        ],
        [
            'code' => 'business',
            'name' => 'Business',
            'description' => 'Pour les salons qui veulent agenda, clients, avis, notifications et visibilité locale.',
            'maxEstablishments' => 1,
            'maxStaff' => 10,
            'maxMonthlyAppointments' => 900,
            'monthly' => 7900,
            'yearly' => 79000,
            'sms' => true,
            'marketing' => true,
            'multi' => false,
            'reports' => true,
        ],
        [
            'code' => 'premium',
            'name' => 'Premium',
            'description' => 'Pour les équipes avancées, réseaux et salons multi-établissements.',
            'maxEstablishments' => 5,
            'maxStaff' => 50,
            'maxMonthlyAppointments' => null,
            'monthly' => 14900,
            'yearly' => 149000,
            'sms' => true,
            'marketing' => true,
            'multi' => true,
            'reports' => true,
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PLANS as $data) {
            $plan = (new SubscriptionPlan())
                ->setCode($data['code'])
                ->setName($data['name'])
                ->setDescription($data['description'])
                ->setMaxEstablishments($data['maxEstablishments'])
                ->setMaxStaff($data['maxStaff'])
                ->setMaxMonthlyAppointments($data['maxMonthlyAppointments'])
                ->setHasSms($data['sms'])
                ->setHasMarketing($data['marketing'])
                ->setHasMultiEstablishment($data['multi'])
                ->setHasAdvancedReports($data['reports'])
                ->setIsActive(true);

            $manager->persist($plan);
            $this->addReference(self::PLAN_REFERENCE_PREFIX.$data['code'], $plan);

            foreach (['monthly' => $data['monthly'], 'yearly' => $data['yearly']] as $interval => $amountCents) {
                $price = (new SubscriptionPlanPrice())
                    ->setPlan($plan)
                    ->setBillingInterval($interval)
                    ->setCurrency('EUR')
                    ->setAmountCents($amountCents)
                    ->setStripePriceId(null)
                    ->setIsActive(true);

                $manager->persist($price);
                $this->addReference(self::PRICE_REFERENCE_PREFIX.$data['code'].'_'.$interval, $price);
            }
        }

        $manager->flush();
    }
}
