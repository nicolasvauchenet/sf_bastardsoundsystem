<?php

namespace App\AdminBundle\Controller\Contact\Adhesions;

use App\AdherentBundle\Entity\Adherent;
use App\AppBundle\Entity\User;
use App\AppBundle\Service\InformationsService;
use App\AppBundle\Service\MailerService;
use App\FrontOfficeBundle\Entity\Adhesion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/adhesions', name: 'admin_contact_adhesions_')]
class AcceptController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/accepter/{id}', name: 'accept')]
    public function accept(EntityManagerInterface      $entityManager,
                           UserPasswordHasherInterface $passwordHasher,
                           MailerService               $mailerService,
                           Request                     $request,
                           InformationsService         $informationsService,
                           Adhesion                    $adhesion): Response
    {
        $userExists = $entityManager->getRepository(User::class)->findOneBy(['email' => $adhesion->getAdherentEmail()]);

        if($userExists) {
            $this->addFlash('danger', "Nous avons déjà quelqu'un avec cette adresse e-mail");

            return $this->redirectToRoute('admin_contact_adhesions_index');
        }

        $adherent = new Adherent();
        $adherent->setAdherentType($adhesion->getAdherentType())
            ->setRoles(['ROLE_ADHERENT'])
            ->setEmail($adhesion->getAdherentEmail())
            ->setPassword($passwordHasher->hashPassword($adherent, 'change-moi-ce-mot-de-passe-tout-de-suite'))
            ->setPhone($adhesion->getAdherentPhone())
            ->setName($adhesion->getAdherentName())
            ->setCreatedAt(new \DateTimeImmutable());
        $entityManager->persist($adherent);

        $adhesion->setAcceptedAt(new \DateTimeImmutable())
            ->setRejectedAt(null);
        $entityManager->persist($adhesion);
        $entityManager->flush();

        $mailerService->sendEmail([
            'from' => [
                'type' => 'Adhérent',
                'name' => $informationsService->getAssociationName(),
                'email' => $informationsService->getAssociationEmail(),
                'phone' => $informationsService->getAssociationPhone(),
            ],
            'to' => [
                'name' => $adherent->getName(),
                'email' => $adherent->getEmail(),
            ],
            'subject' => "Bienvenue chez {$informationsService->getAssociationName()} !",
            'date' => $adhesion->getAcceptedAt(),
            'url' => $request->getSchemeAndHttpHost() . '/adherent',
        ], 'accepted');

        $this->addFlash('success', "Vous avez accepté la demande d'adhésion de {$adhesion->getAdherentName()}");

        return $this->redirectToRoute('admin_contact_adhesions_index');
    }
}
