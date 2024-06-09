<?php

namespace App\Controller\BackOffice\Administration\Equipment;

use App\Entity\BackOffice\Administration\Equipment\Equipment;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DeleteController extends AbstractController
{
    #[Route('/administration/materiel/supprimer/{id}', name: 'app_back_office_administration_equipment_delete')]
    public function delete(FileUploaderService    $fileUploaderService,
                           EntityManagerInterface $entityManager,
                           Equipment              $equipment): Response
    {
        if($equipment->getImage()) {
            $fileUploaderService->remove('equipment', $equipment->getImage());
        }

        if($equipment->getInvoice()) {
            $fileUploaderService->remove('invoices', $equipment->getInvoice());
        }

        $entityManager->remove($equipment);
        $entityManager->flush();

        $this->addFlash('danger', "Le matériel {$equipment->getName()} a été supprimé !");

        return $this->redirectToRoute('app_back_office_administration_equipment_home');
    }

    #[Route('/administration/materiel/image/supprimer/{id}', name: 'app_back_office_administration_equipment_image_delete')]
    public function imageDelete(FileUploaderService    $fileUploaderService,
                                EntityManagerInterface $entityManager,
                                Equipment              $equipment): Response
    {
        if($equipment->getImage()) {
            $fileUploaderService->remove('equipment', $equipment->getImage());
            $equipment->setImage(null);
        }

        $entityManager->persist($equipment);
        $entityManager->flush();

        $this->addFlash('danger', "L'image du matériel {$equipment->getName()} a été supprimée !");

        return $this->redirectToRoute('app_back_office_administration_equipment_view', ['slug' => $equipment->getSlug()]);
    }

    #[Route('/administration/materiel/facture/supprimer/{id}', name: 'app_back_office_administration_equipment_invoice_delete')]
    public function invoiceDelete(FileUploaderService    $fileUploaderService,
                                  EntityManagerInterface $entityManager,
                                  Equipment              $equipment): Response
    {
        if($equipment->getInvoice()) {
            $fileUploaderService->remove('invoices', $equipment->getInvoice());
            $equipment->setInvoice(null);
        }

        $entityManager->persist($equipment);
        $entityManager->flush();

        $this->addFlash('danger', "La facture du matériel {$equipment->getName()} a été supprimée !");

        return $this->redirectToRoute('app_back_office_administration_equipment_view', ['slug' => $equipment->getSlug()]);
    }
}
