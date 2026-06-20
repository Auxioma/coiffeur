<?php

namespace App\DataFixtures;

use App\Entity\NotificationTemplate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

final class NotificationTemplateFixtures extends Fixture implements DependentFixtureInterface
{
    private const TEMPLATES = [
        'client_booking_confirmation' => [
            'audience' => 'client',
            'subject_fr' => 'Votre rendez-vous est confirmé',
            'body_fr' => 'Bonjour {{ client_first_name }}, votre rendez-vous chez {{ salon_name }} est confirmé pour le {{ appointment_date }} à {{ appointment_time }}. Paiement sur place.',
            'subject_en' => 'Your appointment is confirmed',
            'body_en' => 'Hello {{ client_first_name }}, your appointment at {{ salon_name }} is confirmed for {{ appointment_date }} at {{ appointment_time }}. Payment on site.',
        ],
        'client_booking_pending' => [
            'audience' => 'client',
            'subject_fr' => 'Votre demande de rendez-vous est en attente',
            'body_fr' => 'Votre demande a bien été envoyée. Le salon doit encore confirmer le créneau.',
            'subject_en' => 'Your booking request is pending',
            'body_en' => 'Your request has been sent. The salon still needs to confirm the slot.',
        ],
        'client_booking_reminder' => [
            'audience' => 'client',
            'subject_fr' => 'Rappel de votre rendez-vous',
            'body_fr' => 'Votre rendez-vous approche. Merci de confirmer votre présence.',
            'subject_en' => 'Appointment reminder',
            'body_en' => 'Your appointment is coming soon. Please confirm your attendance.',
        ],
        'client_review_request' => [
            'audience' => 'client',
            'subject_fr' => 'Comment s’est passé votre rendez-vous ?',
            'body_fr' => 'Partagez votre avis pour aider les autres clients.',
            'subject_en' => 'How was your appointment?',
            'body_en' => 'Share your review to help other clients.',
        ],
        'pro_new_booking' => [
            'audience' => 'pro',
            'subject_fr' => 'Nouveau rendez-vous reçu',
            'body_fr' => 'Un nouveau rendez-vous vient d’être réservé pour {{ appointment_date }}.',
            'subject_en' => 'New booking received',
            'body_en' => 'A new appointment has just been booked for {{ appointment_date }}.',
        ],
        'pro_subscription_invoice' => [
            'audience' => 'pro',
            'subject_fr' => 'Votre facture d’abonnement est disponible',
            'body_fr' => 'Votre facture SaaS est disponible dans votre espace professionnel.',
            'subject_en' => 'Your subscription invoice is available',
            'body_en' => 'Your SaaS invoice is available in your professional account.',
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (LocaleFixtures::EU_LOCALES as $localeData) {
            $locale = $localeData['code'];

            foreach (self::TEMPLATES as $code => $templateData) {
                $subject = $locale === 'fr' ? $templateData['subject_fr'] : $templateData['subject_en'];
                $body = $locale === 'fr' ? $templateData['body_fr'] : $templateData['body_en'];

                $template = (new NotificationTemplate())
                    ->setCode($code.'_'.$locale)
                    ->setChannel('email')
                    ->setAudience($templateData['audience'])
                    ->setLocale($locale)
                    ->setSubject($subject)
                    ->setBodyText($body)
                    ->setBodyHtml('<p>'.$body.'</p>')
                    ->setIsActive(true);

                $manager->persist($template);
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
