<?php

namespace App\Controller\BackOffice\Administration\Equipment;

use App\Entity\BackOffice\Administration\Equipment\Equipment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ViewController extends AbstractController
{
    #[Route('/administration/materiel/details/{slug}', name: 'app_back_office_administration_equipment_view')]
    public function view(Equipment $equipment): Response
    {
        return $this->render('back_office/administration/equipment/view/index.html.twig', [
            'equipment' => $equipment,
        ]);
    }
}
