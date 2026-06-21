<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PublicController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/about', name: 'app_about', methods: ['GET'])]
    public function about(): Response
    {
        return $this->render('public/about.html.twig', [
            'page_title' => 'À propos — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/accessibility', name: 'app_accessibility', methods: ['GET'])]
    public function accessibility(): Response
    {
        return $this->render('public/accessibility.html.twig', [
            'page_title' => 'Accessibilité — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/blog', name: 'app_blog', methods: ['GET'])]
    public function blog(): Response
    {
        return $this->render('public/blog.html.twig', [
            'page_title' => 'Magazine beauté — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/blog/categories/beauty', name: 'app_blog_category', methods: ['GET'])]
    public function blogCategory(): Response
    {
        return $this->render('public/blog_category.html.twig', [
            'page_title' => 'Conseils coiffure — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/blog/beauty-trends', name: 'app_blog_detail', methods: ['GET'])]
    public function blogDetail(): Response
    {
        return $this->render('public/blog_detail.html.twig', [
            'page_title' => 'Comment choisir le bon salon de coiffure ? — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/hair-salons/paris', name: 'app_category_city_page', methods: ['GET'])]
    public function categoryCityPage(): Response
    {
        return $this->render('public/category_city_page.html.twig', [
            'page_title' => 'Coiffeur au Havre — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/categories/beauty', name: 'app_category_page', methods: ['GET'])]
    public function categoryPage(): Response
    {
        return $this->render('public/category_page.html.twig', [
            'page_title' => 'Catégories beauté — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/cities/paris', name: 'app_city_page', methods: ['GET'])]
    public function cityPage(): Response
    {
        return $this->render('public/city_page.html.twig', [
            'page_title' => 'Beauté au Havre — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/contact', name: 'app_contact', methods: ['GET'])]
    public function contact(): Response
    {
        return $this->render('public/contact.html.twig', [
            'page_title' => 'Contact — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/cookies', name: 'app_cookies', methods: ['GET'])]
    public function cookies(): Response
    {
        return $this->render('public/cookies.html.twig', [
            'page_title' => 'Politique cookies — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/data-protection', name: 'app_data_protection', methods: ['GET'])]
    public function dataProtection(): Response
    {
        return $this->render('public/data_protection.html.twig', [
            'page_title' => 'Protection des données — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/faq', name: 'app_faq_public', methods: ['GET'])]
    public function faqPublic(): Response
    {
        return $this->render('public/faq_public.html.twig', [
            'page_title' => 'FAQ Belle Maison — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/guides/paris', name: 'app_guide_city', methods: ['GET'])]
    public function guideCity(): Response
    {
        return $this->render('public/guide_city.html.twig', [
            'page_title' => 'Guide beauté du Havre — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/help', name: 'app_help_center', methods: ['GET'])]
    public function helpCenter(): Response
    {
        return $this->render('public/help_center.html.twig', [
            'page_title' => 'Centre d’aide — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/help/booking', name: 'app_help_detail', methods: ['GET'])]
    public function helpDetail(): Response
    {
        return $this->render('public/help_detail.html.twig', [
            'page_title' => 'Aide : gérer un rendez-vous — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}', name: 'app_home', methods: ['GET'])]
    public function home(): Response
    {
        return $this->render('public/index.html.twig', [
            'page_title' => 'Belle Maison — Réservation beauté, coiffure & bien-être',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/legal-notice', name: 'app_legal_notice', methods: ['GET'])]
    public function legalNotice(): Response
    {
        return $this->render('public/legal_notice.html.twig', [
            'page_title' => 'Mentions légales — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/privacy-policy', name: 'app_privacy_policy', methods: ['GET'])]
    public function privacyPolicy(): Response
    {
        return $this->render('public/privacy_policy.html.twig', [
            'page_title' => 'Politique de confidentialité — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/salons/maison-eclat-paris', name: 'app_salon_detail', methods: ['GET'])]
    public function salonDetail(): Response
    {
        return $this->render('public/salon_detail.html.twig', [
            'page_title' => 'Maison Élégance — Fiche salon',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/search', name: 'app_search_results', methods: ['GET'])]
    public function searchResults(): Response
    {
        return $this->render('public/search_results.html.twig', [
            'page_title' => 'Recherche salons — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/services/haircut/paris', name: 'app_service_city_page', methods: ['GET'])]
    public function serviceCityPage(): Response
    {
        return $this->render('public/service_city_page.html.twig', [
            'page_title' => 'Balayage au Havre — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/salons/maison-eclat-paris/staff/camille', name: 'app_staff_detail', methods: ['GET'])]
    public function staffDetail(): Response
    {
        return $this->render('public/staff_detail.html.twig', [
            'page_title' => 'Clara Martin — Collaboratrice',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/terms', name: 'app_terms', methods: ['GET'])]
    public function terms(): Response
    {
        return $this->render('public/terms.html.twig', [
            'page_title' => 'Conditions générales d’utilisation — Belle Maison',
        ]);
    }

}