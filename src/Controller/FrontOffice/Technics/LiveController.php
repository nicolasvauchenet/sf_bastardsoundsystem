<?php

namespace App\Controller\FrontOffice\Technics;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/les-prestations-techniques', name: 'app_front_office_technics_live_')]
class LiveController extends AbstractController
{
    #[Route('/regie', name: 'management')]
    public function management(): Response
    {
        return $this->render('front_office/technics/live/management.html.twig');
    }

    #[Route('/sonorisation', name: 'sound')]
    public function sound(): Response
    {
        return $this->render('front_office/technics/live/sound.html.twig');
    }

    #[Route('/plateau', name: 'stage')]
    public function stage(): Response
    {
        return $this->render('front_office/technics/live/stage.html.twig');
    }
}
