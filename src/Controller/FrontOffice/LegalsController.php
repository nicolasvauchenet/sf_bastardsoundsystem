<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_front_office_legals_')]
class LegalsController extends AbstractController
{
    #[Route('mentions-legales', name: 'mentions')]
    public function mentions(): Response
    {
        return $this->render('front_office/legals/mentions.html.twig');
    }

    #[Route('politique-de-confidentialite', name: 'privacy')]
    public function privacy(): Response
    {
        return $this->render('front_office/legals/privacy.html.twig');
    }
}
