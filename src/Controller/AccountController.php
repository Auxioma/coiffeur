<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccountController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account', name: 'app_account_user', methods: ['GET'])]
    public function accountUser(): Response
    {
        return $this->render('account/account.html.twig', [
            'page_title' => 'Accueil client — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/appointments/demo', name: 'app_user_appointment_detail', methods: ['GET'])]
    public function userAppointmentDetail(): Response
    {
        return $this->render('account/appointment_detail.html.twig', [
            'page_title' => 'Détail du rendez-vous — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/appointments', name: 'app_user_appointments', methods: ['GET'])]
    public function userAppointments(): Response
    {
        return $this->render('account/appointments.html.twig', [
            'page_title' => 'Mes rendez-vous — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/appointments/demo/cancel', name: 'app_user_cancel_appointment', methods: ['GET'])]
    public function userCancelAppointment(): Response
    {
        return $this->render('account/cancel_appointment.html.twig', [
            'page_title' => 'Annuler mon RDV — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/delete', name: 'app_user_delete_account', methods: ['GET'])]
    public function userDeleteAccount(): Response
    {
        return $this->render('account/delete_account.html.twig', [
            'page_title' => 'Supprimer mon compte — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/favorites', name: 'app_user_favorites', methods: ['GET'])]
    public function userFavorites(): Response
    {
        return $this->render('account/favorites.html.twig', [
            'page_title' => 'Mes favoris — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/history', name: 'app_user_history', methods: ['GET'])]
    public function userHistory(): Response
    {
        return $this->render('account/history.html.twig', [
            'page_title' => 'Historique — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/loyalty', name: 'app_user_loyalty', methods: ['GET'])]
    public function userLoyalty(): Response
    {
        return $this->render('account/loyalty.html.twig', [
            'page_title' => 'Fidélité — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/notification-preferences', name: 'app_user_notification_preferences', methods: ['GET'])]
    public function userNotificationPreferences(): Response
    {
        return $this->render('account/notification_preferences.html.twig', [
            'page_title' => 'Préférences de notification — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/notifications', name: 'app_user_notifications', methods: ['GET'])]
    public function userNotifications(): Response
    {
        return $this->render('account/notifications.html.twig', [
            'page_title' => 'Notifications — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/profile', name: 'app_user_profile', methods: ['GET'])]
    public function userProfile(): Response
    {
        return $this->render('account/profile.html.twig', [
            'page_title' => 'Mes informations — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/appointments/demo/reschedule', name: 'app_user_reschedule_appointment', methods: ['GET'])]
    public function userRescheduleAppointment(): Response
    {
        return $this->render('account/reschedule_appointment.html.twig', [
            'page_title' => 'Reporter mon RDV — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/reviews/new', name: 'app_user_review_form', methods: ['GET'])]
    public function userReviewForm(): Response
    {
        return $this->render('account/review_form.html.twig', [
            'page_title' => 'Laisser un avis — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/reviews', name: 'app_user_reviews', methods: ['GET'])]
    public function userReviews(): Response
    {
        return $this->render('account/reviews.html.twig', [
            'page_title' => 'Mes avis — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/security', name: 'app_user_security', methods: ['GET'])]
    public function userSecurity(): Response
    {
        return $this->render('account/security.html.twig', [
            'page_title' => 'Sécurité — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/support', name: 'app_user_support', methods: ['GET'])]
    public function userSupport(): Response
    {
        return $this->render('account/support.html.twig', [
            'page_title' => 'Support client — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/account/support/demo', name: 'app_user_support_detail', methods: ['GET'])]
    public function userSupportDetail(): Response
    {
        return $this->render('account/support_detail.html.twig', [
            'page_title' => 'Détail support — Belle Maison',
        ]);
    }

}