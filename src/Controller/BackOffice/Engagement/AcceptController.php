<?php

namespace App\Controller\BackOffice\Engagement;

use App\Entity\Engagement;
use App\Form\EngagementType;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/propositions-de-booking', name: 'app_back_office_engagement_')]
class AcceptController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/accepter/{id}', name: 'accept')]
    public function accept(Request                $request,
                           EntityManagerInterface $entityManager,
                           MailerService          $mailerService,
                           Engagement             $engagement): Response
    {
        $artist = $engagement->getArtist();
        $message = $engagement->getMessage();
        $form = $this->createForm(EngagementType::class, $engagement);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $engagement->setArtist($artist)
                ->setMessage($message)
                ->setStatus('Conclue')
                ->setConcludedAt(new \DateTimeImmutable());
            $entityManager->persist($engagement);
            $entityManager->flush();

            $mailerService->sendEmail([
                'from' => [
                    'name' => 'Bastard Sound System',
                    'email' => 'contact@bastardsoundsystem.org',
                    'phone' => '06 83 57 30 67',
                ],
                'to' => [
                    'name' => $engagement->getName(),
                    'email' => $engagement->getEmail(),
                ],
                'subject' => $engagement->getArtist()->getName() . ' vient jouer chez toi',
                'engagement' => $engagement,
            ], 'back_office/engagement/accept/_email');

            $this->addFlash('success', "Tu as accepté la proposition d'engagement de {$engagement->getName()}&nbsp!");

            return $this->redirectToRoute('app_back_office_engagement_home', ['etat' => 'conclue'], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/engagement/accept/index.html.twig', [
            'form' => $form->createView(),
            'engagement' => $engagement,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
