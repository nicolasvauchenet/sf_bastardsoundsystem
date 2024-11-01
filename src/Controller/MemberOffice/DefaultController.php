<?php

namespace App\Controller\MemberOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/mon-espace-adherent', name: 'app_member_office_home')]
    public function index(): Response
    {
        return $this->render('member_office/default/index.html.twig');
    }
}
