<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class SystemController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/states/empty', name: 'app_empty_state', methods: ['GET'])]
    public function emptyState(): Response
    {
        return $this->render('system/empty_state.html.twig', [
            'page_title' => 'Aucune donnée — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/403', name: 'app_error_403', methods: ['GET'])]
    public function error403(): Response
    {
        return $this->render('system/403.html.twig', [
            'page_title' => 'Accès refusé — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/404', name: 'app_error_404', methods: ['GET'])]
    public function error404(): Response
    {
        return $this->render('system/404.html.twig', [
            'page_title' => 'Page introuvable — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/500', name: 'app_error_500', methods: ['GET'])]
    public function error500(): Response
    {
        return $this->render('system/500.html.twig', [
            'page_title' => 'Erreur serveur — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/states/loading', name: 'app_loading_state', methods: ['GET'])]
    public function loadingState(): Response
    {
        return $this->render('system/loading_state.html.twig', [
            'page_title' => 'Chargement — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/maintenance', name: 'app_maintenance', methods: ['GET'])]
    public function maintenance(): Response
    {
        return $this->render('system/maintenance.html.twig', [
            'page_title' => 'Maintenance — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/offline', name: 'app_offline', methods: ['GET'])]
    public function offline(): Response
    {
        return $this->render('system/offline.html.twig', [
            'page_title' => 'Hors connexion — Belle Maison',
        ]);
    }

}