<?php

namespace App\Security;

use App\Entity\Member\Member;
use App\Entity\Partner\Partner;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if($user instanceof Member || $user instanceof Partner) {
            if(!$user->isActive()) {
                throw new CustomUserMessageAuthenticationException("Ce compte n'existe pas chez BSS !");
            }
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        // Do nothing for post-authentication checks
    }
}
