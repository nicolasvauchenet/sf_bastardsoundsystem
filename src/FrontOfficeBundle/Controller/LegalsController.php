<?php

namespace App\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'front_office_')]
class LegalsController extends AbstractController
{
    #[Route('mentions-legales', name: 'mentions_legales')]
    public function mentionsLegales(): Response
    {
        return $this->render('@FrontOffice/legals/mentions-legales.html.twig');
    }

    #[Route('politique-de-confidentialite', name: 'politique_de_confidentialite')]
    public function confidentialite(): Response
    {
        return $this->render('@FrontOffice/legals/politique-de-confidentialite.html.twig');
    }
}
