<?php

namespace App\Controller\BackOffice\Artist;

use App\Entity\Artist;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/artistes', name: 'app_back_office_artist_')]
class ActiveController extends AbstractController
{
    #[Route('/activation/{slug}', name: 'active')]
    public function active(EntityManagerInterface $entityManager,
                           Artist                 $artist): Response
    {
        $artist->setActive(!$artist->isActive());
        $entityManager->persist($artist);
        $entityManager->flush();

        if($artist->isActive()) {
            $this->addFlash('success', "L'artiste {$artist->getName()} est activé");
        } else {
            $this->addFlash('warning', "L'artiste {$artist->getName()} est désactivé");
        }

        return $this->redirectToRoute('app_back_office_artist_home', [], Response::HTTP_SEE_OTHER);
    }
}
