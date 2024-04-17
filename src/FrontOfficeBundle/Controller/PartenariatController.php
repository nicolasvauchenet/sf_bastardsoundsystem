<?php

namespace App\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'front_office_')]
class PartenariatController extends AbstractController
{
    #[Route('devenir-partenaire', name: 'partenariat')]
    public function index(): Response
    {
        return $this->render('@FrontOffice/partenariat/index.html.twig');
    }
}
