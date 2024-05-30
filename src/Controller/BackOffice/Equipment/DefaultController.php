<?php

namespace App\Controller\BackOffice\Equipment;

use App\Repository\Equipment\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/administration/materiel', name: 'app_back_office_equipment_home')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('back_office/equipment/default/index.html.twig', [
            'categories' => $categoryRepository->findBy([], ['position' => 'ASC']),
        ]);
    }
}
