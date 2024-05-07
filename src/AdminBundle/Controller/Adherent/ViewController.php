<?php

namespace App\AdminBundle\Controller\Adherent;

use App\AdherentBundle\Entity\Adherent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adherents', name: 'admin_adherents_')]
class ViewController extends AbstractController
{
    #[Route('/fiche/{id}', name: 'view')]
    public function view(Adherent $adherent): Response
    {
        return $this->render('@Admin/adherent/view.html.twig', [
            'adherent' => $adherent,
        ]);
    }
}
