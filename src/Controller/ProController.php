<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/agenda', name: 'app_agenda_pro', methods: ['GET'])]
    public function agendaPro(): Response
    {
        return $this->render('pro/agenda.html.twig', [
            'page_title' => 'Agenda & planning — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo/cancel', name: 'app_appointment_cancel_pro', methods: ['GET'])]
    public function appointmentCancelPro(): Response
    {
        return $this->render('pro/appointment_cancel.html.twig', [
            'page_title' => 'Annuler un rendez-vous — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/create', name: 'app_appointment_create_pro', methods: ['GET'])]
    public function appointmentCreatePro(): Response
    {
        return $this->render('pro/appointment_create.html.twig', [
            'page_title' => 'Créer un rendez-vous — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo', name: 'app_appointment_detail_pro', methods: ['GET'])]
    public function appointmentDetailPro(): Response
    {
        return $this->render('pro/appointment_detail.html.twig', [
            'page_title' => 'Fiche rendez-vous — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo/edit', name: 'app_appointment_edit_pro', methods: ['GET'])]
    public function appointmentEditPro(): Response
    {
        return $this->render('pro/appointment_edit.html.twig', [
            'page_title' => 'Modifier un rendez-vous — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo/no-show', name: 'app_appointment_no_show_pro', methods: ['GET'])]
    public function appointmentNoShowPro(): Response
    {
        return $this->render('pro/appointment_no_show.html.twig', [
            'page_title' => 'Marquer no-show — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/appointments/demo/reschedule', name: 'app_appointment_reschedule_pro', methods: ['GET'])]
    public function appointmentReschedulePro(): Response
    {
        return $this->render('pro/appointment_reschedule.html.twig', [
            'page_title' => 'Reporter un rendez-vous — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/availability', name: 'app_availability_pro', methods: ['GET'])]
    public function availabilityPro(): Response
    {
        return $this->render('pro/availability.html.twig', [
            'page_title' => 'Disponibilités & règles — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/billing/invoices', name: 'app_billing_invoices_pro', methods: ['GET'])]
    public function billingInvoicesPro(): Response
    {
        return $this->render('pro/billing_invoices.html.twig', [
            'page_title' => 'Factures — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/billing/payment-method', name: 'app_billing_payment_method_pro', methods: ['GET'])]
    public function billingPaymentMethodPro(): Response
    {
        return $this->render('pro/billing_payment_method.html.twig', [
            'page_title' => 'Moyen de paiement — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/billing', name: 'app_billing_pro', methods: ['GET'])]
    public function billingPro(): Response
    {
        return $this->render('pro/billing.html.twig', [
            'page_title' => 'Facturation SaaS — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/create', name: 'app_client_create_pro', methods: ['GET'])]
    public function clientCreatePro(): Response
    {
        return $this->render('pro/client_create.html.twig', [
            'page_title' => 'Créer un client — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/demo', name: 'app_client_detail_pro', methods: ['GET'])]
    public function clientDetailPro(): Response
    {
        return $this->render('pro/client_detail.html.twig', [
            'page_title' => 'Fiche client — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/demo/edit', name: 'app_client_edit_pro', methods: ['GET'])]
    public function clientEditPro(): Response
    {
        return $this->render('pro/client_edit.html.twig', [
            'page_title' => 'Modifier un client — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/export', name: 'app_client_export_pro', methods: ['GET'])]
    public function clientExportPro(): Response
    {
        return $this->render('pro/client_export.html.twig', [
            'page_title' => 'Exporter les clients — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/import', name: 'app_client_import_pro', methods: ['GET'])]
    public function clientImportPro(): Response
    {
        return $this->render('pro/client_import.html.twig', [
            'page_title' => 'Importer des clients — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients/merge', name: 'app_client_merge_pro', methods: ['GET'])]
    public function clientMergePro(): Response
    {
        return $this->render('pro/client_merge.html.twig', [
            'page_title' => 'Fusionner des doublons — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/clients', name: 'app_clients_pro', methods: ['GET'])]
    public function clientsPro(): Response
    {
        return $this->render('pro/clients.html.twig', [
            'page_title' => 'Clients & mini-CRM — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/dashboard', name: 'app_dashboard_pro', methods: ['GET'])]
    public function dashboardPro(): Response
    {
        return $this->render('pro/dashboard.html.twig', [
            'page_title' => 'Tableau de bord — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/professionals/login', name: 'app_login_pro', methods: ['GET'])]
    public function loginPro(): Response
    {
        return $this->render('pro/login.html.twig', [
            'page_title' => 'Connexion professionnelle — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/marketing', name: 'app_marketing_pro', methods: ['GET'])]
    public function marketingPro(): Response
    {
        return $this->render('pro/marketing.html.twig', [
            'page_title' => 'Marketing & fidélisation — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/establishments', name: 'app_multi_establishment_pro', methods: ['GET'])]
    public function multiEstablishmentPro(): Response
    {
        return $this->render('pro/multi_establishment.html.twig', [
            'page_title' => 'Multi-établissement — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/notifications', name: 'app_notifications_pro', methods: ['GET'])]
    public function notificationsPro(): Response
    {
        return $this->render('pro/notifications.html.twig', [
            'page_title' => 'Notifications & communications — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/onboarding', name: 'app_onboarding_pro', methods: ['GET'])]
    public function onboardingPro(): Response
    {
        return $this->render('pro/onboarding.html.twig', [
            'page_title' => 'Onboarding guidé — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/payments', name: 'app_payments_pro', methods: ['GET'])]
    public function paymentsPro(): Response
    {
        return $this->render('pro/payments.html.twig', [
            'page_title' => 'Paiements & facturation — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/pricing', name: 'app_pricing_pro', methods: ['GET'])]
    public function pricingPro(): Response
    {
        return $this->render('pro/pricing.html.twig', [
            'page_title' => 'Tarifs professionnels — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/professionals/register', name: 'app_register_pro', methods: ['GET'])]
    public function registerPro(): Response
    {
        return $this->render('pro/register.html.twig', [
            'page_title' => 'Inscription professionnelle — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/reports', name: 'app_reports_pro', methods: ['GET'])]
    public function reportsPro(): Response
    {
        return $this->render('pro/reports.html.twig', [
            'page_title' => 'Statistiques & reporting — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/resources/create', name: 'app_resource_create_pro', methods: ['GET'])]
    public function resourceCreatePro(): Response
    {
        return $this->render('pro/resource_create.html.twig', [
            'page_title' => 'Ajouter une ressource — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/resources/demo/edit', name: 'app_resource_edit_pro', methods: ['GET'])]
    public function resourceEditPro(): Response
    {
        return $this->render('pro/resource_edit.html.twig', [
            'page_title' => 'Modifier une ressource — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/resources', name: 'app_resources_pro', methods: ['GET'])]
    public function resourcesPro(): Response
    {
        return $this->render('pro/resources.html.twig', [
            'page_title' => 'Ressources physiques — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/reviews', name: 'app_reviews_pro', methods: ['GET'])]
    public function reviewsPro(): Response
    {
        return $this->render('pro/reviews.html.twig', [
            'page_title' => 'Avis & réputation — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/roles', name: 'app_roles_pro', methods: ['GET'])]
    public function rolesPro(): Response
    {
        return $this->render('pro/roles.html.twig', [
            'page_title' => 'Permissions & rôles — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/categories', name: 'app_service_category_pro', methods: ['GET'])]
    public function serviceCategoryPro(): Response
    {
        return $this->render('pro/service_category.html.twig', [
            'page_title' => 'Catégories de prestations — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/create', name: 'app_service_create_pro', methods: ['GET'])]
    public function serviceCreatePro(): Response
    {
        return $this->render('pro/service_create.html.twig', [
            'page_title' => 'Créer une prestation — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/demo', name: 'app_service_detail_pro', methods: ['GET'])]
    public function serviceDetailPro(): Response
    {
        return $this->render('pro/service_detail.html.twig', [
            'page_title' => 'Fiche prestation — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/demo/edit', name: 'app_service_edit_pro', methods: ['GET'])]
    public function serviceEditPro(): Response
    {
        return $this->render('pro/service_edit.html.twig', [
            'page_title' => 'Modifier une prestation — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services/packages/create', name: 'app_service_package_create_pro', methods: ['GET'])]
    public function servicePackageCreatePro(): Response
    {
        return $this->render('pro/service_package_create.html.twig', [
            'page_title' => 'Créer un forfait — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/services', name: 'app_services_pro', methods: ['GET'])]
    public function servicesPro(): Response
    {
        return $this->render('pro/services.html.twig', [
            'page_title' => 'Catalogue de prestations — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/booking-rules', name: 'app_settings_booking_rules_pro', methods: ['GET'])]
    public function settingsBookingRulesPro(): Response
    {
        return $this->render('pro/settings_booking_rules.html.twig', [
            'page_title' => 'Règles de réservation — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/cancellation-policy', name: 'app_settings_cancellation_policy_pro', methods: ['GET'])]
    public function settingsCancellationPolicyPro(): Response
    {
        return $this->render('pro/settings_cancellation_policy.html.twig', [
            'page_title' => 'Politique d’annulation — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/establishment', name: 'app_settings_establishment_pro', methods: ['GET'])]
    public function settingsEstablishmentPro(): Response
    {
        return $this->render('pro/settings_establishment.html.twig', [
            'page_title' => 'Informations établissement — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/integrations', name: 'app_settings_integrations_pro', methods: ['GET'])]
    public function settingsIntegrationsPro(): Response
    {
        return $this->render('pro/settings_integrations.html.twig', [
            'page_title' => 'Connecteurs — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/languages', name: 'app_settings_languages_pro', methods: ['GET'])]
    public function settingsLanguagesPro(): Response
    {
        return $this->render('pro/settings_languages.html.twig', [
            'page_title' => 'Langues — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/legal', name: 'app_settings_legal_pro', methods: ['GET'])]
    public function settingsLegalPro(): Response
    {
        return $this->render('pro/settings_legal.html.twig', [
            'page_title' => 'Paramètres légaux — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/notifications', name: 'app_settings_notifications_pro', methods: ['GET'])]
    public function settingsNotificationsPro(): Response
    {
        return $this->render('pro/settings_notifications.html.twig', [
            'page_title' => 'Paramètres notifications — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings', name: 'app_settings_pro', methods: ['GET'])]
    public function settingsPro(): Response
    {
        return $this->render('pro/settings.html.twig', [
            'page_title' => 'Paramètres établissement — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/settings/widget', name: 'app_settings_widget_pro', methods: ['GET'])]
    public function settingsWidgetPro(): Response
    {
        return $this->render('pro/settings_widget.html.twig', [
            'page_title' => 'Widget de réservation — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/subscription/checkout', name: 'app_subscription_checkout_pro', methods: ['GET'])]
    public function subscriptionCheckoutPro(): Response
    {
        return $this->render('pro/subscription_checkout.html.twig', [
            'page_title' => 'Finaliser l’abonnement — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/subscription', name: 'app_subscription_pro', methods: ['GET'])]
    public function subscriptionPro(): Response
    {
        return $this->render('pro/subscription.html.twig', [
            'page_title' => 'Mon abonnement — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/subscription/success', name: 'app_subscription_success_pro', methods: ['GET'])]
    public function subscriptionSuccessPro(): Response
    {
        return $this->render('pro/subscription_success.html.twig', [
            'page_title' => 'Abonnement activé — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team/absences', name: 'app_team_absence_pro', methods: ['GET'])]
    public function teamAbsencePro(): Response
    {
        return $this->render('pro/team_absence.html.twig', [
            'page_title' => 'Absences et congés — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team/holidays', name: 'app_team_holidays_pro', methods: ['GET'])]
    public function teamHolidaysPro(): Response
    {
        return $this->render('pro/team_holidays.html.twig', [
            'page_title' => 'Calendrier d’équipe — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team/create', name: 'app_team_member_create_pro', methods: ['GET'])]
    public function teamMemberCreatePro(): Response
    {
        return $this->render('pro/team_member_create.html.twig', [
            'page_title' => 'Ajouter un collaborateur — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team/demo/edit', name: 'app_team_member_edit_pro', methods: ['GET'])]
    public function teamMemberEditPro(): Response
    {
        return $this->render('pro/team_member_edit.html.twig', [
            'page_title' => 'Modifier un collaborateur — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team/demo', name: 'app_team_member_pro', methods: ['GET'])]
    public function teamMemberPro(): Response
    {
        return $this->render('pro/team_member.html.twig', [
            'page_title' => 'Fiche collaborateur — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/team', name: 'app_team_pro', methods: ['GET'])]
    public function teamPro(): Response
    {
        return $this->render('pro/team.html.twig', [
            'page_title' => 'Équipe & collaborateurs — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/verification', name: 'app_verification_pro', methods: ['GET'])]
    public function verificationPro(): Response
    {
        return $this->render('pro/verification.html.twig', [
            'page_title' => 'Vérification du compte — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/pro/waitlist', name: 'app_waitlist_pro', methods: ['GET'])]
    public function waitlistPro(): Response
    {
        return $this->render('pro/waitlist.html.twig', [
            'page_title' => 'Liste d’attente — Belle Maison Pro',
        ]);
    }

}