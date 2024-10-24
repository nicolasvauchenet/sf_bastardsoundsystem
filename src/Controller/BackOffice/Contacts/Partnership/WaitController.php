<?php

namespace App\Controller\BackOffice\Contacts\Partnership;

use App\Entity\Partnership;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administrations/contacts/partenariats', name: 'app_back_office_contacts_partnership_')]
class WaitController extends AbstractController
{
    #[Route('/mettre-en-attente/{id}', name: 'wait')]
    public function wait(EntityManagerInterface $entityManager,
                         Partnership            $partnership): Response
    {
        $partnership->setStatus('Attente');
        $entityManager->persist($partnership);
        $entityManager->flush();

        $this->addFlash('warning', "Tu as mis la proposition de partenariat de {$partnership->getName()} en attente&nbsp!");

        return $this->redirectToRoute('app_back_office_contacts_partnership_home', ['etat' => 'attente'], Response::HTTP_SEE_OTHER);
    }
}
