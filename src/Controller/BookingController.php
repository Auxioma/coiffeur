<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookingController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/account', name: 'app_booking_auth', methods: ['GET'])]
    public function bookingAuth(): Response
    {
        return $this->render('booking/auth.html.twig', [
            'page_title' => 'Connexion ou inscription — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/cancel', name: 'app_booking_cancel', methods: ['GET'])]
    public function bookingCancel(): Response
    {
        return $this->render('booking/cancel.html.twig', [
            'page_title' => 'Annuler un rendez-vous — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/cancelled-by-salon', name: 'app_booking_cancelled_by_salon', methods: ['GET'])]
    public function bookingCancelledBySalon(): Response
    {
        return $this->render('booking/cancelled_by_salon.html.twig', [
            'page_title' => 'Rendez-vous annulé par le salon — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/confirmation', name: 'app_booking_confirmation', methods: ['GET'])]
    public function bookingConfirmation(): Response
    {
        return $this->render('booking/confirmation.html.twig', [
            'page_title' => 'Rendez-vous confirmé — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/email-verification', name: 'app_booking_email_verification', methods: ['GET'])]
    public function bookingEmailVerification(): Response
    {
        return $this->render('booking/email_verification.html.twig', [
            'page_title' => 'Vérification de l’email — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/no-slots', name: 'app_booking_no_slots', methods: ['GET'])]
    public function bookingNoSlots(): Response
    {
        return $this->render('booking/no_slots.html.twig', [
            'page_title' => 'Aucun créneau disponible — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/pending', name: 'app_booking_pending', methods: ['GET'])]
    public function bookingPending(): Response
    {
        return $this->render('booking/pending.html.twig', [
            'page_title' => 'Demande en attente — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/phone-verification', name: 'app_booking_phone_verification', methods: ['GET'])]
    public function bookingPhoneVerification(): Response
    {
        return $this->render('booking/phone_verification.html.twig', [
            'page_title' => 'Vérification du téléphone — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/presence-confirmation', name: 'app_booking_presence_confirmation', methods: ['GET'])]
    public function bookingPresenceConfirmation(): Response
    {
        return $this->render('booking/presence_confirmation.html.twig', [
            'page_title' => 'Confirmer ma présence — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/reschedule', name: 'app_booking_reschedule', methods: ['GET'])]
    public function bookingReschedule(): Response
    {
        return $this->render('booking/reschedule.html.twig', [
            'page_title' => 'Reporter un rendez-vous — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/services', name: 'app_booking_service', methods: ['GET'])]
    public function bookingService(): Response
    {
        return $this->render('booking/service.html.twig', [
            'page_title' => 'Choix des prestations — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/slots', name: 'app_booking_slot', methods: ['GET'])]
    public function bookingSlot(): Response
    {
        return $this->render('booking/slot.html.twig', [
            'page_title' => 'Choix du créneau — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/slot-expired', name: 'app_booking_slot_expired', methods: ['GET'])]
    public function bookingSlotExpired(): Response
    {
        return $this->render('booking/slot_expired.html.twig', [
            'page_title' => 'Créneau expiré — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/staff', name: 'app_booking_staff', methods: ['GET'])]
    public function bookingStaff(): Response
    {
        return $this->render('booking/staff.html.twig', [
            'page_title' => 'Choix du collaborateur — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/summary', name: 'app_booking_summary', methods: ['GET'])]
    public function bookingSummary(): Response
    {
        return $this->render('booking/summary.html.twig', [
            'page_title' => 'Récapitulatif du rendez-vous — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/booking/waitlist', name: 'app_booking_waitlist', methods: ['GET'])]
    public function bookingWaitlist(): Response
    {
        return $this->render('booking/waitlist.html.twig', [
            'page_title' => 'Liste d’attente — Belle Maison',
        ]);
    }

}