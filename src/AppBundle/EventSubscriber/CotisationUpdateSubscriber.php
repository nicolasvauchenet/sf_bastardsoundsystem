<?php

namespace App\AppBundle\EventSubscriber;

use App\AdminBundle\Service\Gestion\CotisationService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class CotisationUpdateSubscriber implements EventSubscriberInterface
{
    private CotisationService $cotisationService;

    public function __construct(CotisationService $cotisationService)
    {
        $this->cotisationService = $cotisationService;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        if(!$event->isMainRequest()) {
            return;
        }

        $this->cotisationService->updateCotisationsStatus();
    }

    public static function getSubscribedEvents(): array
    {
        return [
            RequestEvent::class => 'onKernelRequest',
        ];
    }
}
