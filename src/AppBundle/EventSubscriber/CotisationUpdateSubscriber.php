<?php

namespace App\AppBundle\EventSubscriber;

use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\AdminBundle\Service\Statistics\CotisationService;

class CotisationUpdateSubscriber implements EventSubscriberInterface
{
    private CotisationService $cotisationService;

    public function __construct(CotisationService $cotisationService)
    {
        $this->cotisationService = $cotisationService;
    }

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
