<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthenticationPagesTest extends WebTestCase
{
    public function testRegistrationPageUsesRealProjectForm(): void
    {
        $client = static::createClient();
        $client->request('GET', '/register');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('form[name="registration_form"]');
        self::assertSelectorExists('input[name="registration_form[email]"]');
        self::assertSelectorExists('input[name="registration_form[plainPassword]"]');
        self::assertSelectorExists('input[name="registration_form[agreeTerms]"]');
    }

    public function testLoginPageLinksToRealAuthenticationRoutes(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        self::assertResponseIsSuccessful();
        self::assertGreaterThan(0, $crawler->filter('a[href="/reset-password"]')->count());
        self::assertGreaterThan(0, $crawler->filter('a[href="/register"]')->count());
        self::assertGreaterThan(0, $crawler->filter('nav a[href="/#services"]')->count());
    }

    public function testForgotPasswordPageUsesRealProjectForm(): void
    {
        $client = static::createClient();
        $client->request('GET', '/reset-password');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('form[name="reset_password_request_form"]');
        self::assertSelectorExists('input[name="reset_password_request_form[email]"]');
    }

    public function testResetPasswordRouteCanRedirectToTokenlessPage(): void
    {
        $client = static::createClient();
        $client->request('GET', '/reset-password/reset/test-token');

        self::assertResponseRedirects('/reset-password/reset');
    }

    public function testVerifyEmailWithoutUserRedirectsCleanly(): void
    {
        $client = static::createClient();
        $client->request('GET', '/verify/email');

        self::assertResponseRedirects('/register');
    }
}
