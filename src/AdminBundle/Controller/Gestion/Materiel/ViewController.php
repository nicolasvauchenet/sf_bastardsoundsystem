<?php

namespace App\AdminBundle\Controller\Gestion\Materiel;

use App\AdminBundle\Entity\Materiel\Materiel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/materiel', name: 'admin_gestion_materiel_')]
class ViewController extends AbstractController
{
    #[Route('/fiche/{id}', name: 'view')]
    public function view(Materiel $materiel): Response
    {
        return $this->render('@Admin/gestion/materiel/view.html.twig', [
            'materiel' => $materiel,
        ]);
    }
}
