<?php

namespace App\Controller\BackOffice\Engagement;

use App\Entity\Engagement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/propositions-de-booking', name: 'app_back_office_engagement_')]
class GenerateController extends AbstractController
{
    #[Route('/generer-le-contrat/{id}', name: 'generate')]
    public function generate(EntityManagerInterface $entityManager,
                             Engagement             $engagement): Response
    {
        $engagement->setContract('test.pdf');
        $entityManager->persist($engagement);
        $entityManager->flush();

        $this->addFlash('success', "Tu as généré le contrat de cession pour  la proposition d'engagement de {$engagement->getName()}&nbsp!");

        return $this->redirectToRoute('app_back_office_engagement_home', ['etat' => $engagement->getStatus()], Response::HTTP_SEE_OTHER);
    }
}
