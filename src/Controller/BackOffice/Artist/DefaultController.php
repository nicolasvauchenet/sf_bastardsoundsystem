<?php

namespace App\Controller\BackOffice\Artist;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/artistes', name: 'app_back_office_artist_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(): Response
    {
        return $this->render('back_office/artist/default/index.html.twig');
    }
}
