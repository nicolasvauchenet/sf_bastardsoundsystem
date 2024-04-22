<?php

namespace App\AdminBundle\Controller\Archive\Partenaire;

use App\PartenaireBundle\Entity\Partenaire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/archives/partenaires', name: 'admin_archives_partenaires_')]
class ViewController extends AbstractController
{
    #[Route('/fiche/{id}', name: 'view')]
    public function view(Partenaire $partenaire): Response
    {
        return $this->render('@Admin/archives/partenaire/view.html.twig', [
            'partenaire' => $partenaire,
        ]);
    }
}
