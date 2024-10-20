<?php

namespace App\Controller\FrontOffice\Production;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/la-diffusion', name: 'app_front_office_production_diffusion_')]
class DiffusionController extends AbstractController
{
    #[Route('/pressage-cd-et-vinyle', name: 'pressing')]
    public function pressing(): Response
    {
        return $this->render('front_office/production/diffusion/pressing.html.twig');
    }

    #[Route('/plateformes-de-streaming', name: 'streaming')]
    public function streaming(): Response
    {
        return $this->render('front_office/production/diffusion/streaming.html.twig');
    }

    #[Route('/albums-et-mechandising', name: 'merchandising')]
    public function merchandising(): Response
    {
        return $this->render('front_office/production/diffusion/merchandising.html.twig');
    }
}
