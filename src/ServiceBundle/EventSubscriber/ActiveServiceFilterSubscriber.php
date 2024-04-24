<?php

namespace App\ServiceBundle\EventSubscriber;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ActiveServiceFilterSubscriber implements EventSubscriberInterface
{
    private EntityManagerInterface $em;
    private Security $security;

    public function __construct(EntityManagerInterface $em, Security $security)
    {
        $this->em = $em;
        $this->security = $security;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => 'onKernelRequest',
        ];
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if(!$event->isMainRequest()) {
            return;
        }

        $filter = $this->em->getFilters()->enable('active_service');

        if($this->security->isGranted('ROLE_ADMIN')) {
            $this->em->getFilters()->disable('active_service');
        }
    }
}
