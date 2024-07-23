<?php

namespace App\Controller\BackOffice\Services\Technical;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/administration/services/technique', name: 'app_back_office_services_technical_home')]
    public function index(): Response
    {

        return $this->render('back_office/services/technical/default/index.html.twig');
    }
}
