<?php

namespace App\AdminBundle\Controller\Contact\Adhesions;

use App\FrontOfficeBundle\Entity\Adhesion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/adhesions', name: 'admin_contact_adhesions_')]
class RejectController extends AbstractController
{
    #[Route('/rejeter/{id}', name: 'reject')]
    public function reject(EntityManagerInterface $entityManager, Adhesion $adhesion): Response
    {
        $adhesion->setRejectedAt(new \DateTimeImmutable());
        $entityManager->persist($adhesion);
        $entityManager->flush();

        $this->addFlash('danger', "Vous avez rejeté la demande d'adhésion de {$adhesion->getAdherentName()}");

        return $this->redirectToRoute('admin_contact_adhesions_index');
    }
}
