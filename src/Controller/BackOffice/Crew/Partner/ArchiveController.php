<?php

namespace App\Controller\BackOffice\Crew\Partner;

use App\Entity\Partner\Partner;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArchiveController extends AbstractController
{
    #[Route('/administration/partenaires/archiver/{id}', name: 'app_back_office_crew_partner_archive')]
    public function archive(EntityManagerInterface $entityManager,
                            Partner                $partner): Response
    {
        $partner->setArchivedAt(new \DateTimeImmutable())
            ->setActive(false);
        $entityManager->persist($partner);
        $entityManager->flush();

        $this->addFlash('success', "Le partenaire {$partner->getFullname()} a été archivé !");

        return $this->redirectToRoute('app_back_office_crew_partner_home', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/administration/partenaires/desarchiver/{id}', name: 'app_back_office_crew_partner_unarchive')]
    public function unarchive(EntityManagerInterface $entityManager,
                              Partner                $partner): Response
    {
        $partner->setArchivedAt(null)
            ->setArchivedCause(null)
            ->setActive(true);
        $entityManager->persist($partner);
        $entityManager->flush();

        $this->addFlash('success', "Le partenaire {$partner->getFullname()} a été réintégré !");

        return $this->redirectToRoute('app_back_office_crew_partner_home', [], Response::HTTP_SEE_OTHER);
    }
}
