<?php

namespace App\Controller\BackOffice\Artist;

use App\Entity\Artist;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/artistes', name: 'app_back_office_artist_')]
class DeleteController extends AbstractController
{
    #[Route('/supprimer/{slug}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager,
                           FileUploaderService    $fileUploader,
                           Artist                 $artist): Response
    {
        $fileUploader->removeDirectory('artist/' . $artist->getSlug());
        $entityManager->remove($artist);
        $entityManager->flush();

        $this->addFlash('danger', "Tu as supprimé l'artiste {$artist->getName()}");

        return $this->redirectToRoute('app_back_office_artist_home', [], Response::HTTP_SEE_OTHER);
    }
}
