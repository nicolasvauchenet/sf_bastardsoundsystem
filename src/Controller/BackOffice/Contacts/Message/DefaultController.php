<?php

namespace App\Controller\BackOffice\Contacts\Message;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/contacts/messages', name: 'app_back_office_contacts_message_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(): Response
    {
        return $this->render('back_office/contacts/message/default/index.html.twig');
    }
}
