<?php

namespace App\Controller\BackOffice\Engagement;

use App\Entity\Engagement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/propositions-de-booking', name: 'app_back_office_engagement_')]
class WaitController extends AbstractController
{
    #[Route('/mettre-en-attente/{id}', name: 'wait')]
    public function wait(EntityManagerInterface $entityManager,
                         Engagement             $engagement): Response
    {
        $engagement->setStatus('Attente');
        $entityManager->persist($engagement);
        $entityManager->flush();

        $this->addFlash('warning', "Tu as mis la proposition d'engagement de {$engagement->getName()} en attente&nbsp!");

        return $this->redirectToRoute('app_back_office_engagement_home', ['etat' => 'attente'], Response::HTTP_SEE_OTHER);
    }
}
