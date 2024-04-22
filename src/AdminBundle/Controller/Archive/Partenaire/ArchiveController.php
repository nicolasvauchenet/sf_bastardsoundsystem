<?php

namespace App\AdminBundle\Controller\Archive\Partenaire;

use App\PartenaireBundle\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/archives/partenaires', name: 'admin_archives_partenaires_')]
class ArchiveController extends AbstractController
{
    #[Route('/archiver/{id}', name: 'archive')]
    public function archive(Request                $request,
                            EntityManagerInterface $entityManager,
                            Partenaire             $partenaire): Response
    {
        if($request->request->get('archivedMotivation')) {
            $partenaire->setArchivedAt(new \DateTimeImmutable())
                ->setArchivedMotivation($request->request->get('archivedMotivation'));
            $entityManager->persist($partenaire);
            $entityManager->flush();

            $this->addFlash('warning', "Le partenaire {$partenaire->getName()} a été archivé");
        }

        return $this->redirectToRoute('admin_partenaires_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/reintegrer/{id}', name: 'unarchive')]
    public function unarchive(EntityManagerInterface $entityManager, Partenaire $partenaire): Response
    {
        $partenaire->setArchivedAt(null)
            ->setArchivedMotivation(null);
        $entityManager->persist($partenaire);
        $entityManager->flush();

        $this->addFlash('success', "Le partenaire {$partenaire->getName()} a été réintégré");

        return $this->redirectToRoute('admin_archives_partenaires_index', [], Response::HTTP_SEE_OTHER);
    }
}
