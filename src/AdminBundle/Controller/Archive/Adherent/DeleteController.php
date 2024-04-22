<?php

namespace App\AdminBundle\Controller\Archive\Adherent;

use App\AdherentBundle\Entity\Adherent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/archives/adherents', name: 'admin_archives_adherents_')]
class DeleteController extends AbstractController
{
    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager, Adherent $adherent): Response
    {
        $entityManager->remove($adherent);
        $entityManager->flush();

        $this->addFlash('danger', "L'adhérent {$adherent->getName()} a été supprimé");

        return $this->redirectToRoute('admin_archives_adherents_index', [], Response::HTTP_SEE_OTHER);
    }
}
