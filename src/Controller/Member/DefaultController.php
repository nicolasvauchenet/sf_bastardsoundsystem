<?php

namespace App\Controller\Member;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/adherent', name: 'app_member_home')]
    public function index(): Response
    {
        return $this->render('member/default/index.html.twig');
    }
}
