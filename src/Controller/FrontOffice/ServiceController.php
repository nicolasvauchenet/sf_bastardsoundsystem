<?php

namespace App\Controller\FrontOffice;

use App\Entity\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ServiceController extends AbstractController
{
    #[Route('/service/{slug}', name: 'app_front_office_service')]
    public function index(Service $service): Response
    {
        return $this->render('front_office/service/index.html.twig', [
            'service' => $service,
        ]);
    }
}
