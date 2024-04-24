<?php

namespace App\AdminBundle\Controller\Gestion\Materiel;

use App\AppBundle\Service\FileUploaderService;
use App\MaterielBundle\Entity\Materiel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/materiel', name: 'admin_gestion_materiel_')]
class DeleteController extends AbstractController
{
    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager,
                           FileUploaderService    $fileUploaderService,
                           Materiel               $materiel): Response
    {
        if($materiel->getInvoice()) {
            $fileUploaderService->remove($materiel->getInvoice(), 'materiel');
        }

        $entityManager->remove($materiel);
        $entityManager->flush();

        $this->addFlash('danger', "Vous avez supprimé le matériel {$materiel->getName()}");

        return $this->redirectToRoute('admin_gestion_materiel_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/facture/supprimer/{id}', name: 'delete_invoice')]
    public function deleteInvoice(EntityManagerInterface $entityManager,
                                  FileUploaderService    $fileUploaderService,
                                  Materiel               $materiel): Response
    {
        if($materiel->getInvoice()) {
            $fileUploaderService->remove($materiel->getInvoice(), 'materiel');
            $materiel->setInvoice(null);
            $entityManager->persist($materiel);
            $entityManager->flush();

            $this->addFlash('danger', "Vous avez supprimé la facture du matériel {$materiel->getName()}");
        }

        return $this->redirectToRoute('admin_gestion_materiel_edit', ['id' => $materiel->getId()], Response::HTTP_SEE_OTHER);
    }
}
