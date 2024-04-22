<?php

namespace App\AdminBundle\Controller\Archive\Adherent;

use App\AdherentBundle\Entity\Adherent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/archives/adherents', name: 'admin_archives_adherents_')]
class ArchiveController extends AbstractController
{
    #[Route('/archiver/{id}', name: 'archive')]
    public function archive(EntityManagerInterface $entityManager, Adherent $adherent): Response
    {
        $adherent->setArchivedAt(new \DateTimeImmutable());
        $entityManager->persist($adherent);
        $entityManager->flush();

        $this->addFlash('warning', "L'adhérent {$adherent->getName()} a été archivé");

        return $this->redirectToRoute('admin_adherents_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/reintegrer/{id}', name: 'unarchive')]
    public function unarchive(EntityManagerInterface $entityManager, Adherent $adherent): Response
    {
        $adherent->setArchivedAt(null)
            ->setArchivedMotivation(null);
        $entityManager->persist($adherent);
        $entityManager->flush();

        $this->addFlash('success', "L'adhérent {$adherent->getName()} a été réintégré");

        return $this->redirectToRoute('admin_archives_adherents_index', [], Response::HTTP_SEE_OTHER);
    }
}
