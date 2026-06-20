<?php

namespace App\DataFixtures;

use App\Entity\Locale;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class LocaleFixtures extends Fixture
{
    public const REFERENCE_PREFIX = 'locale_';

    public const EU_LOCALES = [
        ['code' => 'bg', 'name' => 'Bulgarian', 'native' => 'български', 'direction' => 'ltr'],
        ['code' => 'hr', 'name' => 'Croatian', 'native' => 'hrvatski', 'direction' => 'ltr'],
        ['code' => 'cs', 'name' => 'Czech', 'native' => 'čeština', 'direction' => 'ltr'],
        ['code' => 'da', 'name' => 'Danish', 'native' => 'dansk', 'direction' => 'ltr'],
        ['code' => 'nl', 'name' => 'Dutch', 'native' => 'Nederlands', 'direction' => 'ltr'],
        ['code' => 'en', 'name' => 'English', 'native' => 'English', 'direction' => 'ltr'],
        ['code' => 'et', 'name' => 'Estonian', 'native' => 'eesti', 'direction' => 'ltr'],
        ['code' => 'fi', 'name' => 'Finnish', 'native' => 'suomi', 'direction' => 'ltr'],
        ['code' => 'fr', 'name' => 'French', 'native' => 'français', 'direction' => 'ltr'],
        ['code' => 'de', 'name' => 'German', 'native' => 'Deutsch', 'direction' => 'ltr'],
        ['code' => 'el', 'name' => 'Greek', 'native' => 'ελληνικά', 'direction' => 'ltr'],
        ['code' => 'hu', 'name' => 'Hungarian', 'native' => 'magyar', 'direction' => 'ltr'],
        ['code' => 'ga', 'name' => 'Irish', 'native' => 'Gaeilge', 'direction' => 'ltr'],
        ['code' => 'it', 'name' => 'Italian', 'native' => 'italiano', 'direction' => 'ltr'],
        ['code' => 'lv', 'name' => 'Latvian', 'native' => 'latviešu', 'direction' => 'ltr'],
        ['code' => 'lt', 'name' => 'Lithuanian', 'native' => 'lietuvių', 'direction' => 'ltr'],
        ['code' => 'mt', 'name' => 'Maltese', 'native' => 'Malti', 'direction' => 'ltr'],
        ['code' => 'pl', 'name' => 'Polish', 'native' => 'polski', 'direction' => 'ltr'],
        ['code' => 'pt', 'name' => 'Portuguese', 'native' => 'português', 'direction' => 'ltr'],
        ['code' => 'ro', 'name' => 'Romanian', 'native' => 'română', 'direction' => 'ltr'],
        ['code' => 'sk', 'name' => 'Slovak', 'native' => 'slovenčina', 'direction' => 'ltr'],
        ['code' => 'sl', 'name' => 'Slovenian', 'native' => 'slovenščina', 'direction' => 'ltr'],
        ['code' => 'es', 'name' => 'Spanish', 'native' => 'español', 'direction' => 'ltr'],
        ['code' => 'sv', 'name' => 'Swedish', 'native' => 'svenska', 'direction' => 'ltr'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::EU_LOCALES as $index => $data) {
            $locale = (new Locale())
                ->setCode($data['code'])
                ->setName($data['name'])
                ->setNativeName($data['native'])
                ->setDirection($data['direction'])
                ->setIsDefault($data['code'] === 'fr')
                ->setIsEnabled(true)
                ->setSortOrder($index + 1);

            $manager->persist($locale);
            $this->addReference(self::REFERENCE_PREFIX.$data['code'], $locale);
        }

        $manager->flush();
    }
}
