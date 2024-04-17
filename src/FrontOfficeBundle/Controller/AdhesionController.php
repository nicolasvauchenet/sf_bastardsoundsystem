<?php

namespace App\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'front_office_')]
class AdhesionController extends AbstractController
{
    #[Route('devenir-adherent', name: 'adhesion')]
    public function index(): Response
    {
        return $this->render('@FrontOffice/adhesion/index.html.twig');
    }
}
