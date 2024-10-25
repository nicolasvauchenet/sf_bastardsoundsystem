<?php

namespace App\Controller\BackOffice\Engagement;

use App\Entity\Engagement;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/propositions-de-booking', name: 'app_back_office_engagement_')]
class DeleteController extends AbstractController
{
    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager,
                            Engagement             $engagement): Response
    {
        $status = $engagement->getStatus();
        $entityManager->remove($engagement);
        $entityManager->flush();

        $this->addFlash('danger', "Tu as supprimé la proposition d'engagement de {$engagement->getName()}&nbsp!");

        return $this->redirectToRoute('app_back_office_engagement_home', ['etat' => strtolower($status)], Response::HTTP_SEE_OTHER);
    }
}
