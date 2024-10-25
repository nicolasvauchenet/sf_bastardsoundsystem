<?php

namespace App\Controller\BackOffice\Contacts\Partnership;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/contacts/partenariats', name: 'app_back_office_contacts_partnership_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(): Response
    {
        return $this->render('back_office/contacts/partnership/default/index.html.twig');
    }
}
