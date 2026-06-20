<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

final class CategoryFixtures extends Fixture implements DependentFixtureInterface
{
    public const REFERENCE_PREFIX = 'category_';

    /**
     * The goal is not to be a perfect translation database yet.
     * These fixtures provide a multilingual working base for URLs, menus and SEO tests.
     */
    private const CATEGORIES = [
        'coiffure' => [
            'fr' => 'Coiffure', 'en' => 'Hair salon', 'de' => 'Friseur', 'es' => 'Peluquería', 'it' => 'Parrucchiere', 'pt' => 'Cabeleireiro',
            'nl' => 'Kapsalon', 'pl' => 'Fryzjer', 'ro' => 'Coafor', 'bg' => 'Фризьор', 'hr' => 'Frizer', 'cs' => 'Kadeřnictví',
            'da' => 'Frisør', 'et' => 'Juuksur', 'fi' => 'Kampaamo', 'el' => 'Κομμωτήριο', 'hu' => 'Fodrászat', 'ga' => 'Gruagaireacht',
            'lv' => 'Frizētava', 'lt' => 'Kirpykla', 'mt' => 'Parrukkier', 'sk' => 'Kaderníctvo', 'sl' => 'Frizerstvo', 'sv' => 'Frisör',
        ],
        'barbier' => [
            'fr' => 'Barbier', 'en' => 'Barber', 'de' => 'Barbier', 'es' => 'Barbero', 'it' => 'Barbiere', 'pt' => 'Barbeiro',
            'nl' => 'Barbier', 'pl' => 'Barber', 'ro' => 'Bărbier', 'bg' => 'Бръснар', 'hr' => 'Brijač', 'cs' => 'Barber',
            'da' => 'Barber', 'et' => 'Habemeajaja', 'fi' => 'Parturi', 'el' => 'Μπαρμπέρης', 'hu' => 'Borbély', 'ga' => 'Bearbóir',
            'lv' => 'Bārddzinis', 'lt' => 'Barzdaskutys', 'mt' => 'Barbier', 'sk' => 'Barber', 'sl' => 'Brivec', 'sv' => 'Barberare',
        ],
        'institut-beaute' => [
            'fr' => 'Institut de beauté', 'en' => 'Beauty salon', 'de' => 'Kosmetikstudio', 'es' => 'Centro de belleza', 'it' => 'Centro estetico', 'pt' => 'Instituto de beleza',
            'nl' => 'Schoonheidssalon', 'pl' => 'Salon piękności', 'ro' => 'Salon de înfrumusețare', 'bg' => 'Салон за красота', 'hr' => 'Salon ljepote', 'cs' => 'Kosmetický salon',
            'da' => 'Skønhedssalon', 'et' => 'Ilusalong', 'fi' => 'Kauneushoitola', 'el' => 'Ινστιτούτο ομορφιάς', 'hu' => 'Szépségszalon', 'ga' => 'Salon áilleachta',
            'lv' => 'Skaistumkopšanas salons', 'lt' => 'Grožio salonas', 'mt' => 'Salon tas-sbuħija', 'sk' => 'Kozmetický salón', 'sl' => 'Lepotni salon', 'sv' => 'Skönhetssalong',
        ],
        'ongles' => [
            'fr' => 'Ongles', 'en' => 'Nails', 'de' => 'Nägel', 'es' => 'Uñas', 'it' => 'Unghie', 'pt' => 'Unhas',
            'nl' => 'Nagels', 'pl' => 'Paznokcie', 'ro' => 'Unghii', 'bg' => 'Нокти', 'hr' => 'Nokti', 'cs' => 'Nehty',
            'da' => 'Negle', 'et' => 'Küüned', 'fi' => 'Kynnet', 'el' => 'Νύχια', 'hu' => 'Körmök', 'ga' => 'Ingne',
            'lv' => 'Nagi', 'lt' => 'Nagai', 'mt' => 'Dwiefer', 'sk' => 'Nechty', 'sl' => 'Nohti', 'sv' => 'Naglar',
        ],
        'spa-massage' => [
            'fr' => 'Spa & massage', 'en' => 'Spa & massage', 'de' => 'Spa & Massage', 'es' => 'Spa y masaje', 'it' => 'Spa e massaggio', 'pt' => 'Spa e massagem',
            'nl' => 'Spa & massage', 'pl' => 'Spa i masaż', 'ro' => 'Spa și masaj', 'bg' => 'Спа и масаж', 'hr' => 'Spa i masaža', 'cs' => 'Spa a masáž',
            'da' => 'Spa og massage', 'et' => 'Spaa ja massaaž', 'fi' => 'Spa ja hieronta', 'el' => 'Σπα και μασάζ', 'hu' => 'Spa és masszázs', 'ga' => 'Spá agus suathaireacht',
            'lv' => 'Spa un masāža', 'lt' => 'SPA ir masažas', 'mt' => 'Spa u massaġġ', 'sk' => 'Spa a masáž', 'sl' => 'Spa in masaža', 'sv' => 'Spa och massage',
        ],
        'maquillage' => [
            'fr' => 'Maquillage', 'en' => 'Make-up', 'de' => 'Make-up', 'es' => 'Maquillaje', 'it' => 'Make-up', 'pt' => 'Maquilhagem',
            'nl' => 'Make-up', 'pl' => 'Makijaż', 'ro' => 'Machiaj', 'bg' => 'Грим', 'hr' => 'Šminka', 'cs' => 'Make-up',
            'da' => 'Makeup', 'et' => 'Meik', 'fi' => 'Meikkaus', 'el' => 'Μακιγιάζ', 'hu' => 'Smink', 'ga' => 'Smideadh',
            'lv' => 'Grims', 'lt' => 'Makiažas', 'mt' => 'Make-up', 'sk' => 'Make-up', 'sl' => 'Ličenje', 'sv' => 'Makeup',
        ],
        'epilation' => [
            'fr' => 'Épilation', 'en' => 'Hair removal', 'de' => 'Haarentfernung', 'es' => 'Depilación', 'it' => 'Depilazione', 'pt' => 'Depilação',
            'nl' => 'Ontharing', 'pl' => 'Depilacja', 'ro' => 'Epilare', 'bg' => 'Епилация', 'hr' => 'Depilacija', 'cs' => 'Depilace',
            'da' => 'Hårfjerning', 'et' => 'Karvaeemaldus', 'fi' => 'Karvanpoisto', 'el' => 'Αποτρίχωση', 'hu' => 'Szőrtelenítés', 'ga' => 'Baint gruaige',
            'lv' => 'Epilācija', 'lt' => 'Depiliacija', 'mt' => 'Tneħħija tax-xagħar', 'sk' => 'Depilácia', 'sl' => 'Depilacija', 'sv' => 'Hårborttagning',
        ],
        'soin-visage' => [
            'fr' => 'Soin du visage', 'en' => 'Facial treatment', 'de' => 'Gesichtsbehandlung', 'es' => 'Tratamiento facial', 'it' => 'Trattamento viso', 'pt' => 'Tratamento facial',
            'nl' => 'Gezichtsbehandeling', 'pl' => 'Zabieg na twarz', 'ro' => 'Tratament facial', 'bg' => 'Грижа за лице', 'hr' => 'Tretman lica', 'cs' => 'Péče o obličej',
            'da' => 'Ansigtsbehandling', 'et' => 'Näohooldus', 'fi' => 'Kasvohoito', 'el' => 'Περιποίηση προσώπου', 'hu' => 'Arckezelés', 'ga' => 'Cóireáil aghaidhe',
            'lv' => 'Sejas kopšana', 'lt' => 'Veido procedūra', 'mt' => 'Trattament tal-wiċċ', 'sk' => 'Ošetrenie tváre', 'sl' => 'Nega obraza', 'sv' => 'Ansiktsbehandling',
        ],
        'mariage' => [
            'fr' => 'Mariage', 'en' => 'Wedding beauty', 'de' => 'Hochzeitsbeauty', 'es' => 'Belleza para bodas', 'it' => 'Bellezza sposa', 'pt' => 'Beleza para casamento',
            'nl' => 'Bruidsbeauty', 'pl' => 'Uroda ślubna', 'ro' => 'Frumusețe pentru nuntă', 'bg' => 'Сватбена красота', 'hr' => 'Vjenčana ljepota', 'cs' => 'Svatební krása',
            'da' => 'Bryllupsskønhed', 'et' => 'Pulmailu', 'fi' => 'Hääkauneus', 'el' => 'Νυφική ομορφιά', 'hu' => 'Esküvői szépség', 'ga' => 'Áilleacht bainise',
            'lv' => 'Kāzu skaistums', 'lt' => 'Vestuvių grožis', 'mt' => 'Sbuħija għat-tieġ', 'sk' => 'Svadobná krása', 'sl' => 'Poročna lepota', 'sv' => 'Bröllopsskönhet',
        ],
    ];

    private const SEO_TITLE_SUFFIX = [
        'fr' => ' | Réservation en ligne', 'en' => ' | Online Booking', 'de' => ' | Online buchen',
        'es' => ' | Reserva online', 'it' => ' | Prenotazione online', 'nl' => ' | Online boeken',
        'pl' => ' | Rezerwacja online', 'pt' => ' | Reserva online', 'ro' => ' | Rezervare online',
        'bg' => ' | Онлайн резервация', 'hr' => ' | Online rezervacija', 'cs' => ' | Online rezervace',
        'da' => ' | Online booking', 'et' => ' | Veebibroneerimisi', 'fi' => ' | Varaa verkossa',
        'el' => ' | Ηλεκτρονική κράτηση', 'hu' => ' | Online foglalás', 'ga' => ' | Áirithint ar líne',
        'lv' => ' | Rezervēt tiešsaistē', 'lt' => ' | Rezervuoti internetu', 'mt' => ' | Booking online',
        'sk' => ' | Online rezervácia', 'sl' => ' | Spletno rezerviranje', 'sv' => ' | Boka online',
    ];

    private const SEO_DESCRIPTION_TPL = [
        'fr' => 'Trouvez et réservez facilement : %s.',
        'en' => 'Find and book easily: %s.',
        'de' => 'Finden und buchen Sie einfach: %s.',
        'es' => 'Encuentra y reserva fácilmente: %s.',
        'it' => 'Trova e prenota facilmente: %s.',
        'nl' => 'Vind en boek eenvoudig: %s.',
        'pl' => 'Znajdź i zarezerwuj łatwo: %s.',
        'pt' => 'Encontre e reserve facilmente: %s.',
        'ro' => 'Găsiți și rezervați ușor: %s.',
        'bg' => 'Намерете и резервирайте лесно: %s.',
        'hr' => 'Pronađite i rezervirajte jednostavno: %s.',
        'cs' => 'Najděte a rezervujte snadno: %s.',
        'da' => 'Find og book nemt: %s.',
        'et' => 'Leia ja broneeri lihtsalt: %s.',
        'fi' => 'Löydä ja varaa helposti: %s.',
        'el' => 'Βρείτε και κλείστε εύκολα: %s.',
        'hu' => 'Könnyen megtalálhatja és lefoglalhatja: %s.',
        'ga' => 'Faigh agus déan áirithint go héasca: %s.',
        'lv' => 'Atrodiet un rezervējiet viegli: %s.',
        'lt' => 'Raskite ir lengvai rezervuokite: %s.',
        'mt' => 'Sib u ibbukkja b\'faċilità: %s.',
        'sk' => 'Nájdite a rezervujte si jednoducho: %s.',
        'sl' => 'Poiščite in rezervirajte preprosto: %s.',
        'sv' => 'Hitta och boka enkelt: %s.',
    ];

    private const CATEGORY_DESCRIPTION_TPL = [
        'fr' => 'Catégorie de prestation pour la réservation beauté internationale.',
        'en' => 'Beauty service category for international booking.',
        'de' => 'Beauty-Servicekategorie für internationale Buchungen.',
        'es' => 'Categoría de servicio de belleza para reserva internacional.',
        'it' => 'Categoria di servizio beauty per prenotazione internazionale.',
        'nl' => 'Beauty-servicecategorie voor internationale boekingen.',
        'pl' => 'Kategoria usług beauty do rezerwacji międzynarodowej.',
        'default' => 'Beauty service category for international booking.',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (LocaleFixtures::EU_LOCALES as $localeData) {
            $locale = $localeData['code'];
            $titleSuffix = self::SEO_TITLE_SUFFIX[$locale] ?? self::SEO_TITLE_SUFFIX['en'];
            $descTpl = self::SEO_DESCRIPTION_TPL[$locale] ?? self::SEO_DESCRIPTION_TPL['en'];
            $catDesc = self::CATEGORY_DESCRIPTION_TPL[$locale] ?? self::CATEGORY_DESCRIPTION_TPL['default'];

            foreach (self::CATEGORIES as $slug => $translations) {
                $name = $translations[$locale] ?? $translations['en'];

                $category = (new Category())
                    ->setLang($locale)
                    ->setCountryCode(null)
                    ->setName($name)
                    ->setSlug($slug)
                    ->setType(Category::TYPE_SERVICE)
                    ->setSeoTitle($name.$titleSuffix)
                    ->setSeoDescription(sprintf($descTpl, $name))
                    ->setDescription($catDesc)
                    ->setSortOrder(array_search($slug, array_keys(self::CATEGORIES), true) + 1)
                    ->setIsActive(true);

                $manager->persist($category);
                $this->addReference(self::REFERENCE_PREFIX.$locale.'_'.$slug, $category);
            }
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
