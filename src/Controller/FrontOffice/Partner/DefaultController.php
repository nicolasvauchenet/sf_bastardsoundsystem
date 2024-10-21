<?php

namespace App\Controller\FrontOffice\Partner;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/nos-partenaires', name: 'app_front_office_partner_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(): Response
    {
        return $this->render('front_office/partner/default/index.html.twig');
    }
}
