<?php

namespace App\AdminBundle\Controller\Archive\Partenaire;

use App\PartenaireBundle\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/archives/partenaires', name: 'admin_archives_partenaires_')]
class DeleteController extends AbstractController
{
    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager, Partenaire $partenaire): Response
    {
        $entityManager->remove($partenaire);
        $entityManager->flush();

        $this->addFlash('danger', "Le partenaire {$partenaire->getName()} a été supprimé");

        return $this->redirectToRoute('admin_archives_partenaires_index', [], Response::HTTP_SEE_OTHER);
    }
}
