<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class NavBarController extends AbstractController
{
    public function getNavBar(): Response
    {
        return $this->render('_partials/nav_bar.html.twig', []);
    }
}
