<?php

namespace App\Controller\BackOffice\Crew\Partner;

use App\Repository\Partner\PartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/administration/partenaires', name: 'app_back_office_crew_partner_home')]
    public function index(PartnerRepository $partnerRepository): Response
    {
        return $this->render('back_office/crew/partner/default/index.html.twig', [
            'partners' => $partnerRepository->findAll(),
            'activePartners' => $partnerRepository->findBy(['active' => true]),
            'inactivePartners' => $partnerRepository->findBy(['active' => false]),
        ]);
    }
}
