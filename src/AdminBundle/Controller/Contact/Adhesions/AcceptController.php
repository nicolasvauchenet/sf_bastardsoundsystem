<?php

namespace App\AdminBundle\Controller\Contact\Adhesions;

use App\AdherentBundle\Entity\Adherent;
use App\FrontOfficeBundle\Entity\Adhesion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/adhesions', name: 'admin_contact_adhesions_')]
class AcceptController extends AbstractController
{
    #[Route('/accepter/{id}', name: 'accept')]
    public function accept(EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher, Adhesion $adhesion): Response
    {
        $adherent = new Adherent();
        $adherent->setAdherentType($adhesion->getAdherentType())
            ->setRoles(['ROLE_ADHERENT'])
            ->setEmail($adhesion->getAdherentEmail())
            ->setPassword($passwordHasher->hashPassword($adherent, 'change-moi-ce-mot-de-passe-tout-de-suite'))
            ->setPhone($adhesion->getAdherentPhone())
            ->setName($adhesion->getAdherentName())
            ->setCreatedAt(new \DateTimeImmutable());
        $entityManager->persist($adherent);

        $adhesion->setAcceptedAt(new \DateTimeImmutable());
        $entityManager->persist($adhesion);
        $entityManager->flush();

        $this->addFlash('success', "Vous avez accepté la demande d'adhésion de {$adhesion->getAdherentName()}");

        return $this->redirectToRoute('admin_contact_adhesions_index');
    }
}
