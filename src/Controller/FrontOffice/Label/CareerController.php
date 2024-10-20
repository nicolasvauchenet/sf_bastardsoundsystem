<?php

namespace App\Controller\FrontOffice\Label;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/le-management', name: 'app_front_office_label_management_')]
class CareerController extends AbstractController
{
    #[Route('/ta-strategie-de-carriere', name: 'career')]
    public function career(): Response
    {
        return $this->render('front_office/label/management/career.html.twig');
    }

    #[Route('/ta-communication', name: 'communication')]
    public function communication(): Response
    {
        return $this->render('front_office/label/management/communication.html.twig');
    }

    #[Route('/tes-documents-et-tes-visuels', name: 'documents')]
    public function documents(): Response
    {
        return $this->render('front_office/label/management/documents.html.twig');
    }
}
