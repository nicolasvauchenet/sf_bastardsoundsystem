<?php

namespace App\AdminBundle\Controller\Contact\Adhesions;

use App\FrontOfficeBundle\Entity\Adhesion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/adhesions', name: 'admin_contact_adhesions_')]
class DeleteController extends AbstractController
{
    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager, Adhesion $adhesion): Response
    {
        $entityManager->remove($adhesion);
        $entityManager->flush();

        $this->addFlash('danger', "Vous avez supprimé la demande d'adhésion de {$adhesion->getAdherentName()}");

        return $this->redirectToRoute('admin_contact_adhesions_index');
    }
}
