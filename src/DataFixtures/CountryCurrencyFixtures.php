<?php

namespace App\DataFixtures;

use App\Entity\Country;
use App\Entity\Currency;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class CountryCurrencyFixtures extends Fixture
{
    public const COUNTRY_REFERENCE_PREFIX = 'country_';
    public const CURRENCY_REFERENCE_PREFIX = 'currency_';

    private const CURRENCIES = [
        ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€', 'minorUnit' => 2],
        ['code' => 'GBP', 'name' => 'Pound sterling', 'symbol' => '£', 'minorUnit' => 2],
        ['code' => 'CHF', 'name' => 'Swiss franc', 'symbol' => 'CHF', 'minorUnit' => 2],
        ['code' => 'NOK', 'name' => 'Norwegian krone', 'symbol' => 'kr', 'minorUnit' => 2],
        ['code' => 'ISK', 'name' => 'Icelandic króna', 'symbol' => 'kr', 'minorUnit' => 0],
        ['code' => 'BGN', 'name' => 'Bulgarian lev', 'symbol' => 'лв', 'minorUnit' => 2],
        ['code' => 'CZK', 'name' => 'Czech koruna', 'symbol' => 'Kč', 'minorUnit' => 2],
        ['code' => 'DKK', 'name' => 'Danish krone', 'symbol' => 'kr', 'minorUnit' => 2],
        ['code' => 'HUF', 'name' => 'Hungarian forint', 'symbol' => 'Ft', 'minorUnit' => 2],
        ['code' => 'PLN', 'name' => 'Polish złoty', 'symbol' => 'zł', 'minorUnit' => 2],
        ['code' => 'RON', 'name' => 'Romanian leu', 'symbol' => 'lei', 'minorUnit' => 2],
        ['code' => 'SEK', 'name' => 'Swedish krona', 'symbol' => 'kr', 'minorUnit' => 2],
    ];

    private const COUNTRIES = [
        ['code' => 'AT', 'name' => 'Austria', 'native' => 'Österreich', 'locale' => 'de', 'currency' => 'EUR', 'phone' => '+43'],
        ['code' => 'BE', 'name' => 'Belgium', 'native' => 'Belgique / België', 'locale' => 'fr', 'currency' => 'EUR', 'phone' => '+32'],
        ['code' => 'BG', 'name' => 'Bulgaria', 'native' => 'България', 'locale' => 'bg', 'currency' => 'BGN', 'phone' => '+359'],
        ['code' => 'HR', 'name' => 'Croatia', 'native' => 'Hrvatska', 'locale' => 'hr', 'currency' => 'EUR', 'phone' => '+385'],
        ['code' => 'CY', 'name' => 'Cyprus', 'native' => 'Κύπρος', 'locale' => 'el', 'currency' => 'EUR', 'phone' => '+357'],
        ['code' => 'CZ', 'name' => 'Czechia', 'native' => 'Česko', 'locale' => 'cs', 'currency' => 'CZK', 'phone' => '+420'],
        ['code' => 'DK', 'name' => 'Denmark', 'native' => 'Danmark', 'locale' => 'da', 'currency' => 'DKK', 'phone' => '+45'],
        ['code' => 'EE', 'name' => 'Estonia', 'native' => 'Eesti', 'locale' => 'et', 'currency' => 'EUR', 'phone' => '+372'],
        ['code' => 'FI', 'name' => 'Finland', 'native' => 'Suomi', 'locale' => 'fi', 'currency' => 'EUR', 'phone' => '+358'],
        ['code' => 'FR', 'name' => 'France', 'native' => 'France', 'locale' => 'fr', 'currency' => 'EUR', 'phone' => '+33'],
        ['code' => 'DE', 'name' => 'Germany', 'native' => 'Deutschland', 'locale' => 'de', 'currency' => 'EUR', 'phone' => '+49'],
        ['code' => 'GR', 'name' => 'Greece', 'native' => 'Ελλάδα', 'locale' => 'el', 'currency' => 'EUR', 'phone' => '+30'],
        ['code' => 'HU', 'name' => 'Hungary', 'native' => 'Magyarország', 'locale' => 'hu', 'currency' => 'HUF', 'phone' => '+36'],
        ['code' => 'IS', 'name' => 'Iceland', 'native' => 'Ísland', 'locale' => 'is', 'currency' => 'ISK', 'phone' => '+354'],
        ['code' => 'IE', 'name' => 'Ireland', 'native' => 'Ireland / Éire', 'locale' => 'en', 'currency' => 'EUR', 'phone' => '+353'],
        ['code' => 'IT', 'name' => 'Italy', 'native' => 'Italia', 'locale' => 'it', 'currency' => 'EUR', 'phone' => '+39'],
        ['code' => 'LV', 'name' => 'Latvia', 'native' => 'Latvija', 'locale' => 'lv', 'currency' => 'EUR', 'phone' => '+371'],
        ['code' => 'LT', 'name' => 'Lithuania', 'native' => 'Lietuva', 'locale' => 'lt', 'currency' => 'EUR', 'phone' => '+370'],
        ['code' => 'LU', 'name' => 'Luxembourg', 'native' => 'Luxembourg', 'locale' => 'fr', 'currency' => 'EUR', 'phone' => '+352'],
        ['code' => 'MT', 'name' => 'Malta', 'native' => 'Malta', 'locale' => 'mt', 'currency' => 'EUR', 'phone' => '+356'],
        ['code' => 'NL', 'name' => 'Netherlands', 'native' => 'Nederland', 'locale' => 'nl', 'currency' => 'EUR', 'phone' => '+31'],
        ['code' => 'NO', 'name' => 'Norway', 'native' => 'Norge', 'locale' => 'no', 'currency' => 'NOK', 'phone' => '+47'],
        ['code' => 'PL', 'name' => 'Poland', 'native' => 'Polska', 'locale' => 'pl', 'currency' => 'PLN', 'phone' => '+48'],
        ['code' => 'PT', 'name' => 'Portugal', 'native' => 'Portugal', 'locale' => 'pt', 'currency' => 'EUR', 'phone' => '+351'],
        ['code' => 'RO', 'name' => 'Romania', 'native' => 'România', 'locale' => 'ro', 'currency' => 'RON', 'phone' => '+40'],
        ['code' => 'SK', 'name' => 'Slovakia', 'native' => 'Slovensko', 'locale' => 'sk', 'currency' => 'EUR', 'phone' => '+421'],
        ['code' => 'SI', 'name' => 'Slovenia', 'native' => 'Slovenija', 'locale' => 'sl', 'currency' => 'EUR', 'phone' => '+386'],
        ['code' => 'ES', 'name' => 'Spain', 'native' => 'España', 'locale' => 'es', 'currency' => 'EUR', 'phone' => '+34'],
        ['code' => 'SE', 'name' => 'Sweden', 'native' => 'Sverige', 'locale' => 'sv', 'currency' => 'SEK', 'phone' => '+46'],
        ['code' => 'CH', 'name' => 'Switzerland', 'native' => 'Schweiz / Suisse / Svizzera', 'locale' => 'de', 'currency' => 'CHF', 'phone' => '+41'],
        ['code' => 'GB', 'name' => 'United Kingdom', 'native' => 'United Kingdom', 'locale' => 'en', 'currency' => 'GBP', 'phone' => '+44'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CURRENCIES as $data) {
            $currency = (new Currency())
                ->setCode($data['code'])
                ->setName($data['name'])
                ->setSymbol($data['symbol'])
                ->setMinorUnit($data['minorUnit'])
                ->setIsEnabled(true);

            $manager->persist($currency);
            $this->addReference(self::CURRENCY_REFERENCE_PREFIX.$data['code'], $currency);
        }

        foreach (self::COUNTRIES as $data) {
            $country = (new Country())
                ->setCode($data['code'])
                ->setName($data['name'])
                ->setNativeName($data['native'])
                ->setDefaultLocale($data['locale'])
                ->setCurrencyCode($data['currency'])
                ->setPhonePrefix($data['phone'])
                ->setIsEnabled(true);

            $manager->persist($country);
            $this->addReference(self::COUNTRY_REFERENCE_PREFIX.$data['code'], $country);
        }

        $manager->flush();
    }
}
