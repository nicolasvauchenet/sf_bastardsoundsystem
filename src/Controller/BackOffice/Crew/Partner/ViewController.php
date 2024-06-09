<?php

namespace App\Controller\BackOffice\Crew\Partner;

use App\Entity\Partner\Partner;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ViewController extends AbstractController
{
    #[Route('/administration/partenaires/details/{id}', name: 'app_back_office_crew_partner_view')]
    public function index(Partner $partner): Response
    {
        return $this->render('back_office/crew/partner/view/index.html.twig', [
            'partner' => $partner,
        ]);
    }
}
