<?php

namespace App\Controller\PartnerOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/mon-espace-partenaire', name: 'app_partner_office_home')]
    public function index(): Response
    {
        return $this->render('partner_office/default/index.html.twig');
    }
}
