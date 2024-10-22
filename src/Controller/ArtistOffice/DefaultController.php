<?php

namespace App\Controller\ArtistOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/mon-espace-artiste', name: 'app_artist_office_home')]
    public function index(): Response
    {
        return $this->render('artist_office/default/index.html.twig');
    }
}
