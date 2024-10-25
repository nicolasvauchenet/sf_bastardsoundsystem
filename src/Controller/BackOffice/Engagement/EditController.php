<?php

namespace App\Controller\BackOffice\Engagement;

use App\Entity\Engagement;
use App\Form\EngagementType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/propositions-de-booking', name: 'app_back_office_engagement_')]
class EditController extends AbstractController
{
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Request                $request,
                         EntityManagerInterface $entityManager,
                         Engagement             $engagement): Response
    {
        $artist = $engagement->getArtist();
        $message = $engagement->getMessage();
        $status = $engagement->getStatus();
        $form = $this->createForm(EngagementType::class, $engagement);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $engagement->setArtist($artist)
                ->setMessage($message)
                ->setStatus($status);
            $entityManager->persist($engagement);
            $entityManager->flush();
            $this->addFlash('info', "Tu as modifié la proposition d'engagement de {$engagement->getName()}");

            return $this->redirectToRoute('app_back_office_engagement_home', ['etat' => strtolower($status)], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/engagement/edit/index.html.twig', [
            'form' => $form->createView(),
            'engagement' => $engagement,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
