<?php

namespace App\AdminBundle\Controller\Cotisation;

use App\AdherentBundle\Entity\Adherent;
use App\AdminBundle\Entity\Cotisation;
use App\AppBundle\Service\InformationsService;
use App\AppBundle\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/cotisations', name: 'admin_gestion_cotisations_')]
class PaymentController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/payer/{id}', name: 'payment')]
    public function payment(EntityManagerInterface $entityManager,
                            Request                $request,
                            MailerService          $mailerService,
                            InformationsService    $informationsService,
                            Cotisation             $cotisation): Response
    {
        if($cotisation->getStatus() === 'ok') {
            $this->addFlash('warning', "La cotisation de l'adhérent {$cotisation->getAdherent()->getName()} a déjà été payée");

            return $this->redirectToRoute('admin_gestion_cotisations_index', [], Response::HTTP_SEE_OTHER);
        }

        $today = new \DateTimeImmutable();

        $cotisation->setStatus('ok')
            ->setPaidAt($today)
            ->setNextAt($today->modify('+1 year'))
            ->setReminded(null);
        $entityManager->persist($cotisation);
        $entityManager->flush();

        $mailerService->sendEmail([
            'from' => [
                'type' => 'Cotisation',
                'name' => $informationsService->getAssociationName(),
                'email' => $informationsService->getAssociationEmail(),
                'phone' => $informationsService->getAssociationPhone(),
            ],
            'to' => [
                'name' => $cotisation->getAdherent()->getName(),
                'email' => $cotisation->getAdherent()->getEmail(),
            ],
            'subject' => "Merci pour votre cotisation !",
            'amount' => $informationsService->getCotisationAmount(),
            'paidAt' => $cotisation->getPaidAt(),
            'nextAt' => $cotisation->getNextAt(),
            'url' => $request->getSchemeAndHttpHost() . '/adherent',
        ], 'cotisation-paid');

        $this->addFlash('success', "Vous avez validé le paiement de la cotisation de {$cotisation->getAdherent()->getName()}");

        return $this->redirectToRoute('admin_gestion_cotisations_index', [], Response::HTTP_SEE_OTHER);
    }
}
