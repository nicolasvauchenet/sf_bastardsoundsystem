<?php

namespace App\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'front_office_partenaire_')]
class PartenaireController extends AbstractController
{
    #[Route('prestations-et-regie', name: 'prestations_et_regie')]
    public function prestations(): Response
    {
        return $this->render('@FrontOffice/partenaire/prestations-et-regie.html.twig');
    }

    #[Route('organisation-et-formations', name: 'organisation_et_formations')]
    public function organisation(): Response
    {
        return $this->render('@FrontOffice/partenaire/organisation-et-formations.html.twig');
    }
}
