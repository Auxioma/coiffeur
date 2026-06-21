<?php

namespace App\DataFixtures;

use App\Entity\Appointment;
use App\Entity\Establishment;
use App\Entity\NotificationLog;
use App\Entity\Service;
use App\Entity\User;
use App\Entity\WaitlistRequest;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

final class BookingExtendedFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 15; $i++) {
            $establishmentNumber = (($i - 1) % 5) + 1;
            $clientNumber = (($i - 1) % 60) + 1;

            $establishment = $this->getReference(
                ProfessionalDemoFixtures::ESTABLISHMENT_REFERENCE_PREFIX.$establishmentNumber,
                Establishment::class
            );

            $client = $this->getReference(UserFixtures::CLIENT_REFERENCE_PREFIX.$clientNumber, User::class);
            $service = $this->getReference(
                ProfessionalDemoFixtures::SERVICE_REFERENCE_PREFIX.$establishmentNumber.'_soin-cheveux',
                Service::class
            );

            $waitlist = (new WaitlistRequest())
                ->setEstablishment($establishment)
                ->setClient($client)
                ->setService($service)
                ->setPreferredMember(null)
                ->setPreferredDate(new \DateTime('+'.($i + 2).' days'))
                ->setPreferredPeriod($i % 3 === 0 ? 'morning' : 'afternoon')
                ->setStatus($i % 5 === 0 ? 'contacted' : 'open')
                ->setNote('Recherche un créneau plus proche si une place se libère.');

            $manager->persist($waitlist);
        }

        /** @var list<Appointment> $appointments */
        $appointments = $manager->getRepository(Appointment::class)->findAll();

        foreach (array_slice($appointments, 0, 30) as $index => $appointment) {
            $client = $appointment->getClient();
            $establishment = $appointment->getEstablishment();

            $confirmationLog = (new NotificationLog())
                ->setUser($client)
                ->setAppointment($appointment)
                ->setEstablishment($establishment)
                ->setTemplateCode('client_booking_confirmation_fr')
                ->setChannel('email')
                ->setRecipient($client?->getEmail() ?? 'client@example.test')
                ->setSubject('Votre rendez-vous est confirmé')
                ->setStatus('sent')
                ->setProviderMessageId('mail_demo_'.($index + 1))
                ->setFailureReason(null)
                ->setSentAt(new \DateTimeImmutable('-1 day'));

            $smsLog = (new NotificationLog())
                ->setUser($client)
                ->setAppointment($appointment)
                ->setEstablishment($establishment)
                ->setTemplateCode('client_booking_reminder_fr')
                ->setChannel('sms')
                ->setRecipient($client?->getPhone() ?? '+33000000000')
                ->setSubject(null)
                ->setStatus($index % 8 === 0 ? 'failed' : 'sent')
                ->setProviderMessageId('sms_demo_'.($index + 1))
                ->setFailureReason($index % 8 === 0 ? 'Numéro invalide fixture' : null)
                ->setSentAt($index % 8 === 0 ? null : new \DateTimeImmutable('-2 hours'));

            $manager->persist($confirmationLog);
            $manager->persist($smsLog);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            BookingDemoFixtures::class,
            NotificationTemplateFixtures::class,
            ProfessionalDemoFixtures::class,
            UserFixtures::class,
        ];
    }
}
