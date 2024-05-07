<?php

namespace App\AdminBundle\Controller\Adherent;

use App\AdherentBundle\Entity\Adherent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/adherents', name: 'admin_adherents_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        return $this->render('@Admin/adherent/index.html.twig', [
            'adherents' => $entityManager->getRepository(Adherent::class)->findBy(['archivedAt' => null], ['adherentType' => 'ASC', 'createdAt' => 'DESC']),
        ]);
    }
}
