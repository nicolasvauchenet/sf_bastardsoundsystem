<?php

namespace App\Controller\BackOffice\Services\Technical;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/services/technique/dossier-technique', name: 'app_back_office_services_technical_technical_file_')]
class TechnicalFileController extends AbstractController
{
    #[Route('', name: 'view')]
    public function index(): Response
    {

        return $this->render('back_office/services/technical/technical_file/index.html.twig');
    }
}
