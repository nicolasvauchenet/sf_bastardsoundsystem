<?php

namespace App\EventListener;

use App\Entity\User;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class UserLoginListener implements EventSubscriberInterface
{
    private EntityManagerInterface $entityManager;
    private RequestStack $requestStack;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
    {
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            InteractiveLoginEvent::class => 'onSecurityInteractiveLogin',
        ];
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event): void
    {
        $user = $event->getAuthenticationToken()->getUser();
        if($user instanceof User) {
            $user->setConnectedAt(new \DateTimeImmutable());
            $this->entityManager->flush();

            $session = $this->requestStack->getSession();
            $session->getFlashBag()->add('success', 'Hey ! Coucou ' . ($user->getName() ?? $user->getUserIdentifier()) . ' !');
        }
    }
}
