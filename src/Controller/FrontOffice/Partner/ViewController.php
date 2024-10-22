<?php

namespace App\Controller\FrontOffice\Partner;

use App\Repository\PartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/nos-partenaires', name: 'app_front_office_partner_')]
class ViewController extends AbstractController
{
    #[Route('/{slug}', name: 'details')]
    public function index(PartnerRepository $partnerRepository,
                          string            $slug): Response
    {
        return $this->render('front_office/partner/view/index.html.twig', [
            'partner' => $partnerRepository->findOneBy(['slug' => $slug]),
        ]);
    }
}
