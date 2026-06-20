<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\SeoPage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

final class SeoFixtures extends Fixture implements DependentFixtureInterface
{
    private const CITIES = [
        ['slug' => 'paris', 'name' => 'Paris', 'country' => 'FR'],
        ['slug' => 'berlin', 'name' => 'Berlin', 'country' => 'DE'],
        ['slug' => 'madrid', 'name' => 'Madrid', 'country' => 'ES'],
        ['slug' => 'roma', 'name' => 'Roma', 'country' => 'IT'],
        ['slug' => 'lisboa', 'name' => 'Lisboa', 'country' => 'PT'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (LocaleFixtures::EU_LOCALES as $localeData) {
            $locale = $localeData['code'];

            foreach (self::CITIES as $city) {
                $title = $locale === 'fr'
                    ? 'Coiffeur à '.$city['name'].' | Réservation en ligne'
                    : 'Hair salon in '.$city['name'].' | Online booking';

                $seoPage = (new SeoPage())
                    ->setPageType('category_city')
                    ->setLocale($locale)
                    ->setCountryCode($city['country'])
                    ->setSlug($locale.'/coiffeur-'.$city['slug'])
                    ->setTitle($title)
                    ->setMetaDescription($locale === 'fr'
                        ? 'Trouvez un coiffeur à '.$city['name'].' et réservez votre rendez-vous.'
                        : 'Find a hair salon in '.$city['name'].' and book your appointment.')
                    ->setH1($title)
                    ->setContent($locale === 'fr'
                        ? 'Comparez les salons, les avis, les prestations et les disponibilités.'
                        : 'Compare salons, reviews, services and availability.')
                    ->setIsIndexable(true)
                    ->setPublishedAt(new \DateTimeImmutable());

                $manager->persist($seoPage);
            }

            $post = (new BlogPost())
                ->setLocale($locale)
                ->setCountryCode(null)
                ->setSlug($locale.'/tendances-beaute-2026')
                ->setTitle($locale === 'fr' ? 'Tendances beauté 2026' : 'Beauty trends 2026')
                ->setExcerpt($locale === 'fr' ? 'Les inspirations coiffure, soin et beauté à suivre.' : 'Hair, skincare and beauty inspirations to follow.')
                ->setContent($locale === 'fr'
                    ? 'Découvrez les grandes tendances beauté à proposer dans votre salon.'
                    : 'Discover the main beauty trends to offer in your salon.')
                ->setCoverPath('/images/blog/beauty-trends-2026.jpg')
                ->setAuthorName('Beauty Editorial Team')
                ->setStatus('published')
                ->setPublishedAt(new \DateTimeImmutable());

            $manager->persist($post);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LocaleFixtures::class,
        ];
    }
}
