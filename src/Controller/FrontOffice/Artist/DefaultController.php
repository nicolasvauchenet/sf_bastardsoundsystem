<?php

namespace App\Controller\FrontOffice\Artist;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/les-artistes-du-label', name: 'app_front_office_artist_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(): Response
    {
        return $this->render('front_office/artist/default/index.html.twig');
    }
}
