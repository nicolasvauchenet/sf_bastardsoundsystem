<?php

namespace App\AdminBundle\Controller\Contact\Messages;

use App\FrontOfficeBundle\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/messages', name: 'admin_contact_messages_')]
class DeleteController extends AbstractController
{
    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager, Contact $contact): Response
    {
        $entityManager->remove($contact);
        $entityManager->flush();

        $this->addFlash('danger', "Vous avez supprimé le message de {$contact->getSenderEmail()}");

        return $this->redirectToRoute('admin_contact_messages_index');
    }
}
