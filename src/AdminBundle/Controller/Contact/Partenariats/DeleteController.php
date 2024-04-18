<?php

namespace App\AdminBundle\Controller\Contact\Partenariats;

use App\FrontOfficeBundle\Entity\Partenariat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/partenariats', name: 'admin_contact_partenariats_')]
class DeleteController extends AbstractController
{
    #[Route('/supprimer/{id}', name: 'delete')]
    public function delete(EntityManagerInterface $entityManager, Partenariat $partenariat): Response
    {
        $entityManager->remove($partenariat);
        $entityManager->flush();

        $this->addFlash('danger', "Vous avez supprimé la demande de partenariat de {$partenariat->getPartenaireName()}");

        return $this->redirectToRoute('admin_contact_partenariats_index');
    }
}
