<?php

namespace App\AdminBundle\Service\Statistics;

use App\AdminBundle\Entity\Cotisation;
use App\AppBundle\Service\InformationsService;
use App\AppBundle\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class CotisationService
{
    private EntityManagerInterface $entityManager;
    private MailerService $mailerService;
    private InformationsService $informationsService;

    public function __construct(EntityManagerInterface $entityManager, MailerService $mailerService, InformationsService $informationsService)
    {
        $this->entityManager = $entityManager;
        $this->mailerService = $mailerService;
        $this->informationsService = $informationsService;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function updateCotisationsStatus(): void
    {
        $cotisations = $this->entityManager->getRepository(Cotisation::class)->findAll();
        $today = new \DateTimeImmutable();

        foreach($cotisations as $cotisation) {
            $nextAt = $cotisation->getNextAt();
            if($nextAt !== null) {
                $interval = $today->diff($nextAt);
                $days = $interval->days;
                //$isPastDue = $interval->invert == 1;  // True si nextAt est dans le passé

                // Déterminer quel rappel envoyer
                //if(!$isPastDue) {
                    if($days >= 16 && $days <= 30 && $cotisation->getReminded() < 1) {
                        // Envoie premier rappel
                        $this->sendReminder($cotisation, $days);
                    } else if($days >= 1 && $days <= 15 && $cotisation->getReminded() < 2) {
                        // Envoie deuxième rappel
                        $this->sendReminder($cotisation, $days);
                    } else if($days <= 0 && $cotisation->getReminded() < 3) {
                        // Envoie dernier rappel
                        $this->sendReminder($cotisation, $days);
                    }
                //}
            }
        }

        $this->entityManager->flush();
    }

    /**
     * @throws TransportExceptionInterface
     */
    private function sendReminder($cotisation, $days): void
    {
        $cotisation->setStatus('reminded');
        $cotisation->setReminded($cotisation->getReminded() + 1);
        $this->entityManager->persist($cotisation);

        $this->mailerService->sendEmail([
            'from' => [
                'type' => 'Adhérent',
                'name' => $this->informationsService->getAssociationName(),
                'email' => $this->informationsService->getAssociationEmail(),
                'phone' => $this->informationsService->getAssociationPhone(),
            ],
            'to' => [
                'name' => $cotisation->getAdherent()->getName(),
                'email' => $cotisation->getAdherent()->getEmail(),
            ],
            'subject' => "Rappel de cotisation à J-$days - {$this->informationsService->getAssociationName()}",
            'nextAt' => $cotisation->getNextAt(),
            'reminded' => $cotisation->getReminded(),
            'amount' => 12,
        ], 'cotisation-remind');
    }

    public function getCotisationsOk(): array
    {
        return $this->entityManager->getRepository(Cotisation::class)->findAllByStatus('ok');
    }

    public function getCotisationsKo(): array
    {
        return $this->entityManager->getRepository(Cotisation::class)->findAllByStatus('reminded');
    }
}
