<?php

namespace App\Controller\FrontOffice\Artist;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/les-artistes-du-label', name: 'app_front_office_artist_')]
class ViewController extends AbstractController
{
    #[Route('/{slug}', name: 'details')]
    public function index(ArtistRepository $artistRepository,
                          string           $slug): Response
    {
        return $this->render('front_office/artist/view/index.html.twig', [
            'artist' => $artistRepository->findOneBy(['slug' => $slug]),
        ]);
    }
}
