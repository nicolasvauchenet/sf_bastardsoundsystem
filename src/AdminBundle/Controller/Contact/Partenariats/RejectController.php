<?php

namespace App\AdminBundle\Controller\Contact\Partenariats;

use App\FrontOfficeBundle\Entity\Partenariat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/partenariats', name: 'admin_contact_partenariats_')]
class RejectController extends AbstractController
{
    #[Route('/rejeter/{id}', name: 'reject')]
    public function reject(EntityManagerInterface $entityManager, Partenariat $partenariat): Response
    {
        $partenariat->setRejectedAt(new \DateTimeImmutable());
        $entityManager->persist($partenariat);
        $entityManager->flush();

        $this->addFlash('danger', "Vous avez rejeté la demande de partenariat de {$partenariat->getPartenaireName()}");

        return $this->redirectToRoute('admin_contact_partenariats_index');
    }
}
