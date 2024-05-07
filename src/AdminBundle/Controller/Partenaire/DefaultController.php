<?php

namespace App\AdminBundle\Controller\Partenaire;

use App\PartenaireBundle\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/partenaires', name: 'admin_partenaires_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        return $this->render('@Admin/partenaire/index.html.twig', [
            'partenaires' => $entityManager->getRepository(Partenaire::class)->findBy(['archivedAt' => null], ['partenaireType' => 'ASC', 'createdAt' => 'DESC']),
        ]);
    }
}
