<?php

namespace App\Controller\BackOffice\Administration\Equipment;

use App\Entity\Administration\Equipment\Equipment;
use App\Form\Administration\Equipment\EquipmentType;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EditController extends AbstractController
{
    #[Route('/administration/materiel/modifier/{slug}', name: 'app_back_office_administration_equipment_edit')]
    public function edit(Request                $request,
                         EntityManagerInterface $entityManager,
                         FileUploaderService    $fileUploaderService,
                         Equipment              $equipment): Response
    {
        $equipmentInitialStatus = $equipment->getStatus();
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($equipment->getStatus() !== $equipmentInitialStatus) {
                $equipment->setUpdatedAt(new \DateTimeImmutable());
            }
            $entityManager->persist($equipment);
            $entityManager->flush();

            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();
            if($imageFile) {
                if($equipment->getImage()) {
                    $fileUploaderService->remove('equipment', $equipment->getImage());
                }
                $imageFileName = $fileUploaderService->upload($imageFile, 'equipment', $equipment->getSlug());
                $equipment->setImage($imageFileName);
            }

            /** @var UploadedFile $invoiceFile */
            $invoiceFile = $form->get('invoice')->getData();
            if($invoiceFile) {
                if($equipment->getInvoice()) {
                    $fileUploaderService->remove('invoices', $equipment->getInvoice());
                }
                $invoiceFileName = $fileUploaderService->upload($invoiceFile, 'invoices', $equipment->getSlug());
                $equipment->setInvoice($invoiceFileName);
            }

            $entityManager->persist($equipment);
            $entityManager->flush();

            $this->addFlash('success', "Le matériel {$equipment->getName()} a été modifié !");

            return $this->redirectToRoute('app_back_office_administration_equipment_view', ['slug' => $equipment->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/administration/equipment/edit/index.html.twig', [
            'form' => $form->createView(),
            'equipment' => $equipment,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
