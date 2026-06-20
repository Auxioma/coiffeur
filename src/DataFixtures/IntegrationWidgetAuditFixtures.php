<?php

namespace App\DataFixtures;

use App\Entity\AuditLog;
use App\Entity\BookingWidget;
use App\Entity\Establishment;
use App\Entity\IntegrationConnection;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

final class IntegrationWidgetAuditFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $establishment = $this->getReference(
                ProfessionalDemoFixtures::ESTABLISHMENT_REFERENCE_PREFIX.$i,
                Establishment::class
            );

            $actor = $this->getReference(UserFixtures::PRO_REFERENCE_PREFIX.$i, User::class);

            $googleCalendar = (new IntegrationConnection())
                ->setEstablishment($establishment)
                ->setProvider('google_calendar')
                ->setStatus($i % 4 === 0 ? 'expired' : 'connected')
                ->setExternalAccountId('calendar_'.$i.'@example.test')
                ->setAccessTokenEncrypted('encrypted_access_token_demo_'.$i)
                ->setRefreshTokenEncrypted('encrypted_refresh_token_demo_'.$i)
                ->setExpiresAt(new \DateTimeImmutable('+30 days'));

            $googleBusiness = (new IntegrationConnection())
                ->setEstablishment($establishment)
                ->setProvider('google_business_profile')
                ->setStatus('connected')
                ->setExternalAccountId('gbp_location_'.$i)
                ->setAccessTokenEncrypted('encrypted_access_token_gbp_'.$i)
                ->setRefreshTokenEncrypted('encrypted_refresh_token_gbp_'.$i)
                ->setExpiresAt(new \DateTimeImmutable('+60 days'));

            $widget = (new BookingWidget())
                ->setEstablishment($establishment)
                ->setPublicKey('bm_widget_'.bin2hex(random_bytes(8)))
                ->setThemeColor('#0D5C46')
                ->setButtonLabel($i === 2 ? 'Book now' : 'Prendre RDV')
                ->setAllowedDomains([
                    'https://'.$establishment->getSlug().'.example.test',
                    'https://www.example.test',
                ])
                ->setIsActive(true);

            $auditCreate = (new AuditLog())
                ->setActor($actor)
                ->setEstablishment($establishment)
                ->setEntityType('Establishment')
                ->setEntityId($establishment->getId())
                ->setAction('fixture.create')
                ->setChanges([
                    'status' => 'published',
                    'bookingMode' => $establishment->getBookingMode(),
                ])
                ->setIpAddress('127.0.0.1');

            $auditSettings = (new AuditLog())
                ->setActor($actor)
                ->setEstablishment($establishment)
                ->setEntityType('BookingRule')
                ->setEntityId(null)
                ->setAction('settings.update')
                ->setChanges([
                    'presenceConfirmationEnabled' => true,
                    'paymentMode' => 'on_site_only',
                ])
                ->setIpAddress('127.0.0.1');

            $manager->persist($googleCalendar);
            $manager->persist($googleBusiness);
            $manager->persist($widget);
            $manager->persist($auditCreate);
            $manager->persist($auditSettings);
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
