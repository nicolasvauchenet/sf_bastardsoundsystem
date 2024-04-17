<?php

namespace App\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'front_office_')]
class ContactController extends AbstractController
{
    #[Route('contactons-nous', name: 'contact')]
    public function index(): Response
    {
        return $this->render('@FrontOffice/contact/index.html.twig');
    }
}
