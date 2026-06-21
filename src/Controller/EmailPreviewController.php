<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EmailPreviewController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/booking/cancelled', name: 'app_email_booking_cancelled', methods: ['GET'])]
    public function emailBookingCancelled(): Response
    {
        return $this->render('emails/booking_cancelled.html.twig', [
            'page_title' => 'Rendez-vous annulé',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/booking/cancelled/pro', name: 'app_email_booking_cancelled_pro', methods: ['GET'])]
    public function emailBookingCancelledPro(): Response
    {
        return $this->render('emails/booking_cancelled_pro.html.twig', [
            'page_title' => 'Rendez-vous annulé côté client',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/booking/confirmation', name: 'app_email_booking_confirmation', methods: ['GET'])]
    public function emailBookingConfirmation(): Response
    {
        return $this->render('emails/booking_confirmation.html.twig', [
            'page_title' => 'Rendez-vous confirmé',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/booking/pending', name: 'app_email_booking_pending', methods: ['GET'])]
    public function emailBookingPending(): Response
    {
        return $this->render('emails/booking_pending.html.twig', [
            'page_title' => 'Demande en attente',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/booking/reminder', name: 'app_email_booking_reminder', methods: ['GET'])]
    public function emailBookingReminder(): Response
    {
        return $this->render('emails/booking_reminder.html.twig', [
            'page_title' => 'Rappel de rendez-vous',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/new/booking/pro', name: 'app_email_new_booking_pro', methods: ['GET'])]
    public function emailNewBookingPro(): Response
    {
        return $this->render('emails/new_booking_pro.html.twig', [
            'page_title' => 'Nouveau rendez-vous reçu',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/presence/confirmation', name: 'app_email_presence_confirmation', methods: ['GET'])]
    public function emailPresenceConfirmation(): Response
    {
        return $this->render('emails/presence_confirmation.html.twig', [
            'page_title' => 'Confirmez votre présence',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/reset/password/pro', name: 'app_email_reset_password_pro', methods: ['GET'])]
    public function emailResetPasswordPro(): Response
    {
        return $this->render('emails/reset_password_pro.html.twig', [
            'page_title' => 'Mot de passe pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/reset/password/user', name: 'app_email_reset_password_user', methods: ['GET'])]
    public function emailResetPasswordUser(): Response
    {
        return $this->render('emails/reset_password_user.html.twig', [
            'page_title' => 'Réinitialisation de mot de passe',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/review/request', name: 'app_email_review_request', methods: ['GET'])]
    public function emailReviewRequest(): Response
    {
        return $this->render('emails/review_request.html.twig', [
            'page_title' => 'Comment s’est passée votre visite ?',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/dev/emails/subscription/invoice/pro', name: 'app_email_subscription_invoice_pro', methods: ['GET'])]
    public function emailSubscriptionInvoicePro(): Response
    {
        return $this->render('emails/subscription_invoice_pro.html.twig', [
            'page_title' => 'Votre facture Belle Maison Pro',
        ]);
    }

}