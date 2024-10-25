<?php

namespace App\Controller\BackOffice\Contacts\Membership;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/contacts/adhesions', name: 'app_back_office_contacts_membership_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(): Response
    {
        return $this->render('back_office/contacts/membership/default/index.html.twig');
    }
}
