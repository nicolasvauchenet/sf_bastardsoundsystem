<?php

namespace App\Controller\FrontOffice\Production;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/la-production', name: 'app_front_office_production_music_')]
class MusicController extends AbstractController
{
    #[Route('/enregistrement-live', name: 'recording_live')]
    public function recordingLive(): Response
    {
        return $this->render('front_office/production/music/recording_live.html.twig');
    }

    #[Route('/enregistrement-studio', name: 'recording_studio')]
    public function recordingStudio(): Response
    {
        return $this->render('front_office/production/music/recording_studio.html.twig');
    }

    #[Route('/mastering-professionnel', name: 'mastering')]
    public function mastering(): Response
    {
        return $this->render('front_office/production/music/mastering.html.twig');
    }
}
