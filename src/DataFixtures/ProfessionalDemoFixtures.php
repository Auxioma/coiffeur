<?php

namespace App\DataFixtures;

use App\Entity\BookingRule;
use App\Entity\Establishment;
use App\Entity\EstablishmentMedia;
use App\Entity\EstablishmentMember;
use App\Entity\EstablishmentOpeningHour;
use App\Entity\EstablishmentRole;
use App\Entity\EstablishmentTranslation;
use App\Entity\PhysicalResource;
use App\Entity\ProfessionalAccount;
use App\Entity\Service;
use App\Entity\ServiceCategory;
use App\Entity\ServiceTranslation;
use App\Entity\ServiceVariant;
use App\Entity\Subscription;
use App\Entity\SubscriptionPlanPrice;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

final class ProfessionalDemoFixtures extends Fixture implements DependentFixtureInterface
{
    public const ESTABLISHMENT_REFERENCE_PREFIX = 'establishment_';
    public const MEMBER_REFERENCE_PREFIX = 'member_';
    public const SERVICE_REFERENCE_PREFIX = 'service_';

    private const ESTABLISHMENTS = [
        [
            'name' => 'Salon Lumière', 'slug' => 'salon-lumiere',
            'countryCode' => 'FR', 'city' => 'Paris', 'postalCode' => '75008',
            'address' => '42 Rue du Faubourg Saint-Honoré', 'timezone' => 'Europe/Paris',
            'currency' => 'EUR', 'phone' => '+33 1 42 00 00 01', 'email' => 'contact@salon-lumiere.test',
            'lat' => '48.8719000', 'lng' => '2.3104000',
        ],
        [
            'name' => 'Beauty Studio Berlin', 'slug' => 'beauty-studio-berlin',
            'countryCode' => 'DE', 'city' => 'Berlin', 'postalCode' => '10115',
            'address' => 'Unter den Linden 5', 'timezone' => 'Europe/Berlin',
            'currency' => 'EUR', 'phone' => '+49 30 12 00 00 02', 'email' => 'info@beauty-studio-berlin.test',
            'lat' => '52.5166000', 'lng' => '13.3888000',
        ],
        [
            'name' => 'Salon Madrid', 'slug' => 'salon-madrid',
            'countryCode' => 'ES', 'city' => 'Madrid', 'postalCode' => '28001',
            'address' => 'Gran Vía 10', 'timezone' => 'Europe/Madrid',
            'currency' => 'EUR', 'phone' => '+34 91 00 00 03', 'email' => 'info@salon-madrid.test',
            'lat' => '40.4200000', 'lng' => '-3.7025000',
        ],
        [
            'name' => 'Salone Roma', 'slug' => 'salone-roma',
            'countryCode' => 'IT', 'city' => 'Rome', 'postalCode' => '00186',
            'address' => 'Via del Corso 100', 'timezone' => 'Europe/Rome',
            'currency' => 'EUR', 'phone' => '+39 06 00 00 04', 'email' => 'info@salone-roma.test',
            'lat' => '41.8975000', 'lng' => '12.4806000',
        ],
        [
            'name' => 'Studio Stockholm', 'slug' => 'studio-stockholm',
            'countryCode' => 'SE', 'city' => 'Stockholm', 'postalCode' => '11122',
            'address' => 'Drottninggatan 50', 'timezone' => 'Europe/Stockholm',
            'currency' => 'SEK', 'phone' => '+46 8 00 00 05', 'email' => 'info@studio-stockholm.test',
            'lat' => '59.3325000', 'lng' => '18.0645000',
        ],
        [
            'name' => 'Salon Amsterdam', 'slug' => 'salon-amsterdam',
            'countryCode' => 'NL', 'city' => 'Amsterdam', 'postalCode' => '1012 AB',
            'address' => 'Kalverstraat 15', 'timezone' => 'Europe/Amsterdam',
            'currency' => 'EUR', 'phone' => '+31 20 00 00 06', 'email' => 'info@salon-amsterdam.test',
            'lat' => '52.3731000', 'lng' => '4.8922000',
        ],
        [
            'name' => 'Warsaw Beauty', 'slug' => 'warsaw-beauty',
            'countryCode' => 'PL', 'city' => 'Warsaw', 'postalCode' => '00-001',
            'address' => 'Nowy Świat 18', 'timezone' => 'Europe/Warsaw',
            'currency' => 'PLN', 'phone' => '+48 22 00 00 07', 'email' => 'info@warsaw-beauty.test',
            'lat' => '52.2319000', 'lng' => '21.0122000',
        ],
        [
            'name' => 'Beauty Brussels', 'slug' => 'beauty-brussels',
            'countryCode' => 'BE', 'city' => 'Brussels', 'postalCode' => '1000',
            'address' => 'Grand Place 5', 'timezone' => 'Europe/Brussels',
            'currency' => 'EUR', 'phone' => '+32 2 00 00 08', 'email' => 'info@beauty-brussels.test',
            'lat' => '50.8467000', 'lng' => '4.3525000',
        ],
    ];

    /** Base service price per currency (cents) */
    private const SERVICE_PRICES = [
        'EUR' => ['coupe-femme' => 5500, 'coupe-homme' => 3500, 'couleur' => 9000, 'brushing' => 4000, 'soin-cheveux' => 6000],
        'SEK' => ['coupe-femme' => 65000, 'coupe-homme' => 42000, 'couleur' => 110000, 'brushing' => 48000, 'soin-cheveux' => 72000],
        'PLN' => ['coupe-femme' => 18000, 'coupe-homme' => 11000, 'couleur' => 32000, 'brushing' => 15000, 'soin-cheveux' => 22000],
    ];

    /** Service translations: [locale => name] */
    private const SERVICE_TRANSLATIONS = [
        'coupe-femme' => [
            'fr' => "Coupe femme", 'en' => "Women's haircut", 'de' => 'Damenhaarschnitt',
            'es' => 'Corte mujer', 'it' => 'Taglio donna', 'nl' => 'Damesknipbeurt',
            'pl' => 'Strzyżenie damskie', 'sv' => 'Damklippning',
        ],
        'coupe-homme' => [
            'fr' => "Coupe homme", 'en' => "Men's haircut", 'de' => 'Herrenhaarschnitt',
            'es' => 'Corte hombre', 'it' => 'Taglio uomo', 'nl' => 'Herenknipbeurt',
            'pl' => 'Strzyżenie męskie', 'sv' => 'Herrklippning',
        ],
        'couleur' => [
            'fr' => "Coloration", 'en' => "Hair color", 'de' => 'Haarfarbe',
            'es' => 'Coloración', 'it' => 'Colorazione', 'nl' => 'Haarkleuring',
            'pl' => 'Koloryzacja', 'sv' => 'Hårfärgning',
        ],
        'brushing' => [
            'fr' => "Brushing", 'en' => "Blow dry", 'de' => 'Föhnen',
            'es' => 'Brushing', 'it' => 'Piega', 'nl' => 'Föhnen',
            'pl' => 'Blow dry', 'sv' => 'Föning',
        ],
        'soin-cheveux' => [
            'fr' => "Soin cheveux", 'en' => "Hair treatment", 'de' => 'Haarpflege',
            'es' => 'Tratamiento capilar', 'it' => 'Trattamento capelli', 'nl' => 'Haarbehandeling',
            'pl' => 'Pielęgnacja włosów', 'sv' => 'Hårbehandling',
        ],
    ];

    private const COUNTRY_LOCALE_MAP = [
        'FR' => 'fr', 'DE' => 'de', 'ES' => 'es', 'IT' => 'it',
        'SE' => 'sv', 'NL' => 'nl', 'PL' => 'pl', 'BE' => 'fr',
    ];

    private const COUNTRY_TIMEZONE_MAP = [
        'FR' => 'Europe/Paris', 'DE' => 'Europe/Berlin', 'ES' => 'Europe/Madrid',
        'IT' => 'Europe/Rome', 'SE' => 'Europe/Stockholm', 'NL' => 'Europe/Amsterdam',
        'PL' => 'Europe/Warsaw', 'BE' => 'Europe/Brussels',
    ];

    public function load(ObjectManager $manager): void
    {
        $staffIndex = 1;

        foreach (self::ESTABLISHMENTS as $index => $data) {
            $estNum = $index + 1;

            /** @var User $proUser */
            $proUser = $this->getReference(UserFixtures::PRO_REFERENCE_PREFIX.$estNum, User::class);

            /** @var SubscriptionPlanPrice $planPrice */
            $planPrice = $this->getReference(
                SubscriptionPlanFixtures::PRICE_REFERENCE_PREFIX.'business_monthly',
                SubscriptionPlanPrice::class
            );

            $locale = self::COUNTRY_LOCALE_MAP[$data['countryCode']] ?? 'en';

            $professionalAccount = (new ProfessionalAccount())
                ->setOwner($proUser)
                ->setLegalName($data['name'])
                ->setLegalForm('LLC')
                ->setRegistrationNumber('REG'.str_pad((string) $estNum, 10, '0', STR_PAD_LEFT))
                ->setVatNumber(strtoupper($data['countryCode']).str_pad((string) $estNum, 12, '0', STR_PAD_LEFT))
                ->setBillingEmail('billing+'.$estNum.'@example.test')
                ->setBillingPhone($data['phone'])
                ->setBillingCountryCode($data['countryCode'])
                ->setOnboardingStatus('active');

            $manager->persist($professionalAccount);

            $subscription = (new Subscription())
                ->setProfessionalAccount($professionalAccount)
                ->setPlanPrice($planPrice)
                ->setStatus('active')
                ->setCurrentPeriodStartsAt(new \DateTimeImmutable('-10 days'))
                ->setCurrentPeriodEndsAt(new \DateTimeImmutable('+20 days'))
                ->setCancelAtPeriodEnd(false);

            $manager->persist($subscription);

            $establishment = (new Establishment())
                ->setPublicId($this->publicId())
                ->setName($data['name'])
                ->setSlug($data['slug'])
                ->setActivityType('coiffure')
                ->setPhone($data['phone'])
                ->setEmail($data['email'])
                ->setAddressLine1($data['address'])
                ->setPostalCode($data['postalCode'])
                ->setCity($data['city'])
                ->setCountryCode($data['countryCode'])
                ->setLatitude($data['lat'])
                ->setLongitude($data['lng'])
                ->setTimezone($data['timezone'])
                ->setStatus('active')
                ->setBookingMode('auto_confirm')
                ->setPaymentMode('on_site_only')
                ->setProfessionalAccount($professionalAccount);

            $manager->persist($establishment);
            $this->addReference(self::ESTABLISHMENT_REFERENCE_PREFIX.$estNum, $establishment);

            // Translations for the establishment
            foreach (['en', 'fr', 'de', 'es', 'it', 'nl', 'pl', 'sv'] as $transLocale) {
                if ($transLocale === $locale) {
                    continue;
                }
                $translation = (new EstablishmentTranslation())
                    ->setEstablishment($establishment)
                    ->setLocale($transLocale)
                    ->setName($data['name'])
                    ->setSeoTitle($data['name'].' | Online Booking')
                    ->setSeoDescription('Book your appointment at '.$data['name'].' online.');
                $manager->persist($translation);
            }

            // Booking rule
            $bookingRule = (new BookingRule())
                ->setEstablishment($establishment)
                ->setMinDelayBeforeBookingMinutes(120)
                ->setMaxBookingAheadDays(90)
                ->setCancellationLimitHours(24)
                ->setMaxActiveFutureAppointmentsNewClient(1)
                ->setAllowStaffChoice(true)
                ->setConfirmationMode('auto')
                ->setPresenceConfirmationEnabled(true)
                ->setPresenceConfirmationHoursBefore(24);

            $manager->persist($bookingRule);

            // Opening hours (Mon=1 to Sat=6, closed Sun=0)
            for ($weekday = 1; $weekday <= 6; $weekday++) {
                $openingHour = (new EstablishmentOpeningHour())
                    ->setEstablishment($establishment)
                    ->setWeekday($weekday)
                    ->setIsOpen(true)
                    ->setMorningStart(new \DateTime('09:00'))
                    ->setMorningEnd(new \DateTime('12:00'))
                    ->setAfternoonStart(new \DateTime('13:00'))
                    ->setAfternoonEnd(new \DateTime('19:00'));
                $manager->persist($openingHour);
            }
            $closedSunday = (new EstablishmentOpeningHour())
                ->setEstablishment($establishment)
                ->setWeekday(0)
                ->setIsOpen(false);
            $manager->persist($closedSunday);

            // System roles (owner + stylist)
            $ownerRole = (new EstablishmentRole())
                ->setCode('owner')
                ->setLabel('Owner')
                ->setIsSystem(true)
                ->setEstablishment($establishment);
            $stylistRole = (new EstablishmentRole())
                ->setCode('stylist')
                ->setLabel('Stylist')
                ->setIsSystem(true)
                ->setEstablishment($establishment);
            $manager->persist($ownerRole);
            $manager->persist($stylistRole);

            // Owner member (linked to pro user)
            $ownerMember = (new EstablishmentMember())
                ->setEstablishment($establishment)
                ->setUser($proUser)
                ->setRole($ownerRole)
                ->setDisplayName($proUser->getFullName() ?: $data['name'].' — Owner')
                ->setJobTitle('Owner')
                ->setIsBookableOnline(true)
                ->setIsActive(true);
            $manager->persist($ownerMember);
            $this->addReference(self::MEMBER_REFERENCE_PREFIX.$estNum.'_1', $ownerMember);

            // Staff members (2 staff per establishment)
            for ($s = 1; $s <= 2; $s++) {
                if ($staffIndex > 18) {
                    break;
                }
                /** @var User $staffUser */
                $staffUser = $this->getReference(UserFixtures::STAFF_REFERENCE_PREFIX.$staffIndex, User::class);
                $staffMember = (new EstablishmentMember())
                    ->setEstablishment($establishment)
                    ->setUser($staffUser)
                    ->setRole($stylistRole)
                    ->setDisplayName($staffUser->getFullName() ?: 'Stylist '.$staffIndex)
                    ->setJobTitle('Stylist')
                    ->setIsBookableOnline(true)
                    ->setIsActive(true);
                $manager->persist($staffMember);
                $this->addReference(self::MEMBER_REFERENCE_PREFIX.$estNum.'_'.($s + 1), $staffMember);
                ++$staffIndex;
            }

            // Service category
            $category = (new ServiceCategory())
                ->setEstablishment($establishment)
                ->setName('Coiffure')
                ->setSlug('coiffure')
                ->setSortOrder(1)
                ->setIsActive(true);
            $manager->persist($category);

            // Services
            $currency = $data['currency'];
            $prices = self::SERVICE_PRICES[$currency] ?? self::SERVICE_PRICES['EUR'];

            foreach (array_keys(self::SERVICE_TRANSLATIONS) as $serviceSlug) {
                $defaultLocale = $locale;
                $serviceName = self::SERVICE_TRANSLATIONS[$serviceSlug][$defaultLocale]
                    ?? self::SERVICE_TRANSLATIONS[$serviceSlug]['en'];

                $service = (new Service())
                    ->setEstablishment($establishment)
                    ->setCategory($category)
                    ->setName($serviceName)
                    ->setSlug($serviceSlug)
                    ->setDurationMinutes($serviceSlug === 'couleur' ? 90 : 60)
                    ->setPriceCents($prices[$serviceSlug])
                    ->setCurrency($currency)
                    ->setPriceLabel('fixed')
                    ->setIsBookableOnline(true)
                    ->setIsActive(true)
                    ->setRequiresConfirmation(false)
                    ->setSortOrder(array_search($serviceSlug, array_keys(self::SERVICE_TRANSLATIONS), true) + 1);

                $manager->persist($service);
                $this->addReference(self::SERVICE_REFERENCE_PREFIX.$estNum.'_'.$serviceSlug, $service);

                // Service translations
                foreach (self::SERVICE_TRANSLATIONS[$serviceSlug] as $transLocale => $transName) {
                    if ($transLocale === $defaultLocale) {
                        continue;
                    }
                    $serviceTranslation = (new ServiceTranslation())
                        ->setService($service)
                        ->setLocale($transLocale)
                        ->setName($transName);
                    $manager->persist($serviceTranslation);
                }
            }

            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return [
            UserFixtures::class,
            SubscriptionPlanFixtures::class,
            LocaleFixtures::class,
        ];
    }

    private function publicId(): string
    {
        return strtoupper(substr(bin2hex(random_bytes(13)), 0, 26));
    }
}