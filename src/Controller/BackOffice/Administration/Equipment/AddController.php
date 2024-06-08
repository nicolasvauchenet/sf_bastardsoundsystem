<?php

namespace App\Controller\BackOffice\Administration\Equipment;

use App\Entity\Administration\Equipment\Category;
use App\Entity\Administration\Equipment\Equipment;
use App\Form\Administration\Equipment\EquipmentType;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AddController extends AbstractController
{
    #[Route('/administration/materiel/ajouter/{slug}', name: 'app_back_office_administration_equipment_add')]
    public function add(Request                $request,
                        EntityManagerInterface $entityManager,
                        FileUploaderService    $fileUploaderService,
                        Category               $category): Response
    {
        $equipment = (new Equipment())
            ->setCategory($category)
            ->setActive(true)
            ->setStatus('OK');
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($equipment);
            $entityManager->flush();

            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();
            if($imageFile) {
                $imageFileName = $fileUploaderService->upload($imageFile, 'equipment', $equipment->getSlug());
                $equipment->setImage($imageFileName);
            }

            /** @var UploadedFile $invoiceFile */
            $invoiceFile = $form->get('invoice')->getData();
            if($invoiceFile) {
                $invoiceFileName = $fileUploaderService->upload($invoiceFile, 'invoices', $equipment->getSlug());
                $equipment->setInvoice($invoiceFileName);
            }

            $entityManager->persist($equipment);
            $entityManager->flush();

            $this->addFlash('success', "Le matériel {$equipment->getName()} a été créé !");

            return $this->redirectToRoute('app_back_office_administration_equipment_view', ['slug' => $equipment->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/administration/equipment/add/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
