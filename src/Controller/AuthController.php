<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthController extends AbstractController
{
    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/professionals/password/forgot', name: 'app_forgot_password', methods: ['GET'])]
    public function forgotPassword(): Response
    {
        return $this->render('auth/forgot_password.html.twig', [
            'page_title' => 'Mot de passe oublié — Belle Maison Pro',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/password/forgot', name: 'app_forgot_password_user', methods: ['GET'])]
    public function forgotPasswordUser(): Response
    {
        return $this->render('auth/forgot_password_user.html.twig', [
            'page_title' => 'Mot de passe oublié — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/login', name: 'app_login_user', methods: ['GET'])]
    public function loginUser(): Response
    {
        return $this->render('auth/login_user.html.twig', [
            'page_title' => 'Connexion client — Belle Maison',
        ]);
    }

    #[Route('/{_locale<en|fr|de|es|it|pt|nl|pl|ro|bg|hr|cs|da|et|fi|el|hu|ga|lv|lt|mt|sk|sl|sv>?en}/register', name: 'app_register_user', methods: ['GET'])]
    public function registerUser(): Response
    {
        return $this->render('auth/register_user.html.twig', [
            'page_title' => 'Créer un compte client — Belle Maison',
        ]);
    }

}