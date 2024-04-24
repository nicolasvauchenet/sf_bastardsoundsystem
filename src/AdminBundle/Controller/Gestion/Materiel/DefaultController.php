<?php

namespace App\AdminBundle\Controller\Gestion\Materiel;

use App\AdminBundle\Entity\Materiel\Materiel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/materiel', name: 'admin_gestion_materiel_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        return $this->render('@Admin/gestion/materiel/index.html.twig', [
            'materielsOk' => $entityManager->getRepository(Materiel::class)->findByStatus('Ok'),
            'materielsKo' => $entityManager->getRepository(Materiel::class)->findByStatus('Hors service'),
        ]);
    }
}
