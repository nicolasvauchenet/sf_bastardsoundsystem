<?php

namespace App\Controller\BackOffice\Contacts\Partnership;

use App\Entity\Partnership;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/contacts/partenariats', name: 'app_back_office_contacts_partnership_')]
class ArchiveController extends AbstractController
{
    #[Route('/refuser/{id}', name: 'archive')]
    public function archive(EntityManagerInterface $entityManager,
                            Partnership            $partnership): Response
    {
        $partnership->setStatus('Archive');
        $entityManager->persist($partnership);
        $entityManager->flush();

        $this->addFlash('danger', "Tu as refusé la proposition de partenariat de {$partnership->getName()}&nbsp!");

        return $this->redirectToRoute('app_back_office_contacts_partnership_home', ['etat' => 'archive'], Response::HTTP_SEE_OTHER);
    }
}
