<?php

namespace App\Controller\BackOffice\Engagement;

use App\Entity\Engagement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/propositions-de-booking', name: 'app_back_office_engagement_')]
class ArchiveController extends AbstractController
{
    #[Route('/refuser/{id}', name: 'archive')]
    public function archive(EntityManagerInterface $entityManager,
                            Engagement             $engagement): Response
    {
        $engagement->setStatus('Archive');
        $entityManager->persist($engagement);
        $entityManager->flush();

        $this->addFlash('danger', "Tu as refusé la proposition d'engagement de {$engagement->getName()}&nbsp!");

        return $this->redirectToRoute('app_back_office_engagement_home', ['etat' => 'archive'], Response::HTTP_SEE_OTHER);
    }
}
