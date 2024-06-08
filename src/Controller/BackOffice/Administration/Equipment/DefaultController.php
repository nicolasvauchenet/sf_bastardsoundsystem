<?php

namespace App\Controller\BackOffice\Administration\Equipment;

use App\Repository\Administration\Equipment\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/administration/materiel', name: 'app_back_office_administration_equipment_home')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('back_office/administration/equipment/default/index.html.twig', [
            'categories' => $categoryRepository->findBy([], ['position' => 'ASC']),
        ]);
    }
}
