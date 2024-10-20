<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_front_office_legal_')]
class LegalController extends AbstractController
{
    #[Route('mentions-legales', name: 'mentions')]
    public function mentions(): Response
    {
        return $this->render('front_office/legal/mentions.html.twig');
    }

    #[Route('politique-de-confidantialite', name: 'privacy')]
    public function privacy(): Response
    {
        return $this->render('front_office/legal/privacy.html.twig');
    }

    #[Route('cgu', name: 'cgu')]
    public function cgu(): Response
    {
        return $this->render('front_office/legal/cgu.html.twig');
    }
}
