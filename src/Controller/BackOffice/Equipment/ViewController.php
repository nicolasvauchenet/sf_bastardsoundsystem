<?php

namespace App\Controller\BackOffice\Equipment;

use App\Entity\Equipment\Equipment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ViewController extends AbstractController
{
    #[Route('/administration/materiel/details/{slug}', name: 'app_back_office_equipment_view')]
    public function view(Equipment $equipment): Response
    {
        return $this->render('back_office/equipment/view/index.html.twig', [
            'equipment' => $equipment,
        ]);
    }
}
