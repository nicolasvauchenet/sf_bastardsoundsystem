<?php

namespace App\Controller\FrontOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contacter-bss', name: 'app_front_office_contact')]
    public function index(): Response
    {
        return $this->render('front_office/contact/index.html.twig', [

        ]);
    }
}