<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    private RouterInterface $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token): ?Response
    {
        $roles = $token->getRoleNames();

        if(in_array('ROLE_ADMIN', $roles, true)) {
            $redirectUrl = $this->router->generate('app_back_office_home');
        } else if(in_array('ROLE_MEMBER', $roles, true)) {
            $redirectUrl = $this->router->generate('app_member_office_home');
        } else if(in_array('ROLE_ARTIST', $roles, true)) {
            $redirectUrl = $this->router->generate('app_artist_office_home');
        } else if(in_array('ROLE_PARTNER', $roles, true)) {
            $redirectUrl = $this->router->generate('app_partner_office_home');
        } else {
            $redirectUrl = $this->router->generate('app_front_office_home');
        }

        return new RedirectResponse($redirectUrl);
    }
}
