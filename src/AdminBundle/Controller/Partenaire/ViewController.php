<?php

namespace App\AdminBundle\Controller\Partenaire;

use App\PartenaireBundle\Entity\Partenaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/partenaires', name: 'admin_partenaires_')]
class ViewController extends AbstractController
{
    #[Route('/fiche/{id}', name: 'view')]
    public function view(Partenaire $partenaire): Response
    {
        return $this->render('@Admin/partenaire/view.html.twig', [
            'partenaire' => $partenaire,
        ]);
    }
}
