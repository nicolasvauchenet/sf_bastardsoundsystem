<?php

namespace App\AdminBundle\Controller\Contact\Partenariats;

use App\AppBundle\Entity\User;
use App\AppBundle\Service\InformationsService;
use App\AppBundle\Service\MailerService;
use App\FrontOfficeBundle\Entity\Partenariat;
use App\PartenaireBundle\Entity\Partenaire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/partenariats', name: 'admin_contact_partenariats_')]
class AcceptController extends AbstractController
{
    #[Route('/accepter/{id}', name: 'accept')]
    public function accept(EntityManagerInterface      $entityManager,
                           UserPasswordHasherInterface $passwordHasher,
                           MailerService               $mailerService,
                           Request                     $request,
                           InformationsService         $informationsService,
                           Partenariat                 $partenariat): Response
    {
        $userExists = $entityManager->getRepository(User::class)->findOneBy(['email' => $partenariat->getPartenaireEmail()]);
        if($userExists) {
            $this->addFlash('danger', "Nous avons déjà quelqu'un avec cette adresse e-mail");

            return $this->redirectToRoute('admin_contact_partenariats_index');
        }

        $partenaire = new Partenaire();
        $partenaire->setPartenaireType($partenariat->getPartenaireType())
            ->setRoles(['ROLE_PARTENAIRE'])
            ->setEmail($partenariat->getPartenaireEmail())
            ->setPassword($passwordHasher->hashPassword($partenaire, 'change-moi-ce-mot-de-passe-tout-de-suite'))
            ->setPhone($partenariat->getPartenairePhone())
            ->setName($partenariat->getPartenaireName())
            ->setCreatedAt(new \DateTimeImmutable());
        $entityManager->persist($partenaire);

        $partenariat->setAcceptedAt(new \DateTimeImmutable())
            ->setRejectedAt(null);
        $entityManager->persist($partenariat);
        $entityManager->flush();

        $mailerService->sendEmail([
            'from' => [
                'type' => 'Partenaire',
                'name' => $informationsService->getAssociationName(),
                'email' => $informationsService->getAssociationEmail(),
                'phone' => $informationsService->getAssociationPhone(),
            ],
            'to' => [
                'name' => $partenaire->getName(),
                'email' => $partenaire->getEmail(),
            ],
            'subject' => "Bienvenue chez {$informationsService->getAssociationName()} !",
            'date' => $partenariat->getAcceptedAt(),
            'url' => $request->getSchemeAndHttpHost() . '/partenaire',
        ], 'accepted');

        $this->addFlash('success', "Vous avez accepté la demande de partenariat de {$partenariat->getPartenaireName()}");

        return $this->redirectToRoute('admin_contact_partenariats_index');
    }
}