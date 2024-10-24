<?php

namespace App\Controller\BackOffice\Contacts\Membership;

use App\Repository\MembershipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administrations/contacts/adhesions', name: 'app_back_office_contacts_membership_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(MembershipRepository $membershipRepository): Response
    {
        return $this->render('back_office/contacts/membership/default/index.html.twig');
    }
}
