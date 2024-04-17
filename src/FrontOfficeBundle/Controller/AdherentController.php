<?php

namespace App\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'front_office_adherent_')]
class AdherentController extends AbstractController
{
    #[Route('visuels-et-communication', name: 'visuels_et_communication')]
    public function communication(): Response
    {
        return $this->render('@FrontOffice/adherent/visuels-et-communication.html.twig');
    }

    #[Route('contrats-et-dossiers', name: 'contrats_et_dossiers')]
    public function contrats(): Response
    {
        return $this->render('@FrontOffice/adherent/contrats-et-dossiers.html.twig');
    }
}
