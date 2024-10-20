<?php

namespace App\Controller\FrontOffice\Technics;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/les-prestations-techniques', name: 'app_front_office_technics_capture_')]
class CaptureController extends AbstractController
{
    #[Route('/photo-live', name: 'photo')]
    public function photo(): Response
    {
        return $this->render('front_office/technics/capture/photo.html.twig');
    }

    #[Route('/video-live', name: 'video')]
    public function video(): Response
    {
        return $this->render('front_office/technics/capture/video.html.twig');
    }

    #[Route('/clips-musicaux', name: 'clip')]
    public function clip(): Response
    {
        return $this->render('front_office/technics/capture/clip.html.twig');
    }
}
