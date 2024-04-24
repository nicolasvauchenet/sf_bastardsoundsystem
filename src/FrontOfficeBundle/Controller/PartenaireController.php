<?php

namespace App\FrontOfficeBundle\Controller;

use App\ServiceBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('', name: 'front_office_partenaire_')]
class PartenaireController extends AbstractController
{
    #[Route('/services/partenaire/{slug}', name: 'services')]
    public function communication(Category $category): Response
    {
        return $this->render('@FrontOffice/partenaire/services.html.twig', [
            'category' => $category,
        ]);
    }
}
