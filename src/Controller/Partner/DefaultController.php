<?php

namespace App\Controller\Partner;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/partenaire', name: 'app_partner_home')]
    public function index(): Response
    {
        return $this->render('partner/default/index.html.twig');
    }
}
