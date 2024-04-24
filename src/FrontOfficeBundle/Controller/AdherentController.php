<?php

namespace App\FrontOfficeBundle\Controller;

use App\ServiceBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('', name: 'front_office_adherent_')]
class AdherentController extends AbstractController
{
    #[Route('/services/adherent/{slug}', name: 'services')]
    public function communication(Category $category): Response
    {
        return $this->render('@FrontOffice/adherent/services.html.twig', [
            'category' => $category,
        ]);
    }
}
