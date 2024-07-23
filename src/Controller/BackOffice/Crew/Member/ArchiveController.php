<?php

namespace App\Controller\BackOffice\Crew\Member;

use App\Entity\Member\Member;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArchiveController extends AbstractController
{
    #[Route('/administration/membres/archiver/{id}', name: 'app_back_office_crew_member_archive')]
    public function archive(EntityManagerInterface $entityManager,
                            Member                 $member): Response
    {
        $member->setArchivedAt(new \DateTimeImmutable())
            ->setActive(false);
        $entityManager->persist($member);
        $entityManager->flush();

        $this->addFlash('success', "L'adhérent {$member->getFullname()} a été archivé !");

        return $this->redirectToRoute('app_back_office_crew_member_home', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/administration/membres/desarchiver/{id}', name: 'app_back_office_crew_member_unarchive')]
    public function unarchive(EntityManagerInterface $entityManager,
                              Member                 $member): Response
    {
        $member->setArchivedAt(null)
            ->setArchivedCause(null)
            ->setActive(true);
        $entityManager->persist($member);
        $entityManager->flush();

        $this->addFlash('success', "L'adhérent {$member->getFullname()} a été réintégré !");

        return $this->redirectToRoute('app_back_office_crew_member_home', [], Response::HTTP_SEE_OTHER);
    }
}
