<?php

namespace App\Controller\BackOffice\Crew\Partner;

use App\Entity\Partner\Partner;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DeleteController extends AbstractController
{
    #[Route('/administration/partenaires/supprimer/{id}', name: 'app_back_office_crew_partner_delete')]
    public function delete(FileUploaderService    $fileUploaderService,
                           EntityManagerInterface $entityManager,
                           Partner                $partner): Response
    {
        if($partner->getLogo()) {
            $fileUploaderService->remove('partner', $partner->getLogo());
        }

        $entityManager->remove($partner);
        $entityManager->flush();

        $this->addFlash('danger', "Le partenaire {$partner->getFullname()} a été supprimé !");

        return $this->redirectToRoute('app_back_office_crew_partner_home');
    }

    #[Route('/administration/partenaires/logo/supprimer/{id}', name: 'app_back_office_crew_partner_logo_delete')]
    public function imageDelete(FileUploaderService    $fileUploaderService,
                                EntityManagerInterface $entityManager,
                                Partner                $partner): Response
    {
        if($partner->getLogo()) {
            $fileUploaderService->remove('partner', $partner->getLogo());
            $partner->setLogo(null);
        }

        $entityManager->persist($partner);
        $entityManager->flush();

        $this->addFlash('danger', "Le logo du partenaire {$partner->getFullname()} a été supprimé !");

        return $this->redirectToRoute('app_back_office_crew_partner_view', ['id' => $partner->getId()]);
    }
}
