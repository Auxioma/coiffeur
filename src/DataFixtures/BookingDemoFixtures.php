<?php

namespace App\DataFixtures;

use App\Entity\Appointment;
use App\Entity\AppointmentItem;
use App\Entity\AppointmentStatusHistory;
use App\Entity\Review;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

final class BookingDemoFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $statuses = [
            Appointment::class => ['confirmed', 'pending_confirmation', 'completed', 'cancelled_by_client', 'no_show'],
        ];

        for ($i = 1; $i <= 40; $i++) {
            $establishmentNumber = (($i - 1) % 5) + 1;
            $clientNumber = (($i - 1) % 60) + 1;

            $establishment = $this->getReference(ProfessionalDemoFixtures::ESTABLISHMENT_REFERENCE_PREFIX.$establishmentNumber);
            $member = $this->getReference(ProfessionalDemoFixtures::MEMBER_REFERENCE_PREFIX.$establishmentNumber.'_1');
            $client = $this->getReference(UserFixtures::CLIENT_REFERENCE_PREFIX.$clientNumber, User::class);
            $service = $this->getReference(ProfessionalDemoFixtures::SERVICE_REFERENCE_PREFIX.$establishmentNumber.'_coupe-femme');

            $startsAt = (new \DateTimeImmutable('today 09:00'))->modify('+'.($i % 18).' days')->modify('+'.(($i % 8) * 60).' minutes');
            $endsAt = $startsAt->modify('+60 minutes');
            $status = $i <= 15 ? 'completed' : ($i % 7 === 0 ? 'pending_confirmation' : 'confirmed');

            $appointment = (new Appointment())
                ->setPublicId($this->publicId())
                ->setEstablishment($establishment)
                ->setClient($client)
                ->setMainMember($member)
                ->setOrigin($i % 4 === 0 ? 'phone' : 'online')
                ->setStatus($status)
                ->setStartsAt($startsAt)
                ->setEndsAt($endsAt)
                ->setTotalDurationMinutes(60)
                ->setTotalPriceCents(5500)
                ->setCurrency('EUR')
                ->setPaymentMode('on_site')
                ->setCancellationPolicyAcceptedAt(new \DateTimeImmutable('-1 day'))
                ->setClientNote($i % 5 === 0 ? 'Préférence pour un résultat naturel.' : null)
                ->setInternalNote($i % 9 === 0 ? 'Client à rappeler avant le rendez-vous.' : null)
                ->setConfirmedAt($status === 'confirmed' || $status === 'completed' ? new \DateTimeImmutable('-1 day') : null)
                ->setCompletedAt($status === 'completed' ? $endsAt : null);

            $item = (new AppointmentItem())
                ->setAppointment($appointment)
                ->setService($service)
                ->setServiceVariant(null)
                ->setMember($member)
                ->setResource(null)
                ->setLabel('Coupe femme')
                ->setStartsAt($startsAt)
                ->setEndsAt($endsAt)
                ->setDurationMinutes(60)
                ->setPriceCents(5500)
                ->setSortOrder(1);

            $history = (new AppointmentStatusHistory())
                ->setAppointment($appointment)
                ->setChangedBy($client)
                ->setOldStatus('draft')
                ->setNewStatus($status)
                ->setReason('Fixture demo')
                ->setChangedAt(new \DateTimeImmutable('-1 day'));

            $manager->persist($appointment);
            $manager->persist($item);
            $manager->persist($history);

            if ($status === 'completed' && $i % 2 === 0) {
                $review = (new Review())
                    ->setEstablishment($establishment)
                    ->setAppointment($appointment)
                    ->setClient($client)
                    ->setRating($faker->numberBetween(4, 5))
                    ->setComment($faker->sentence(12))
                    ->setStatus('published')
                    ->setProReply($i % 4 === 0 ? 'Merci beaucoup pour votre confiance.' : null)
                    ->setProReplyAt($i % 4 === 0 ? new \DateTimeImmutable('-2 hours') : null);

                $manager->persist($review);
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

    private function publicId(): string
    {
        return strtoupper(substr(bin2hex(random_bytes(13)), 0, 26));
    }
}
