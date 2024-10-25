<?php

namespace App\Controller\BackOffice\Engagement;

use App\Entity\Engagement;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/propositions-de-booking', name: 'app_back_office_engagement_')]
class ReviveController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/relancer/{id}', name: 'revive')]
    public function revive(EntityManagerInterface $entityManager,
                           MailerService          $mailerService,
                           Engagement             $engagement): Response
    {
        $engagement->setStatus('Relance')
            ->setRevivedAt(new \DateTimeImmutable());
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
            'subject' => "Relance : le paiement du concert de " . $engagement->getArtist()->getName(),
            'engagement' => $engagement,
        ], 'back_office/engagement/revive/_email');

        $this->addFlash('success', "Tu as relancé le paiement pour {$engagement->getName()}&nbsp!");

        return $this->redirectToRoute('app_back_office_engagement_home', ['etat' => 'relance'], Response::HTTP_SEE_OTHER);
    }
}
