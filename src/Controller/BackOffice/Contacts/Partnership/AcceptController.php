<?php

namespace App\Controller\BackOffice\Contacts\Partnership;

use App\Entity\Partner;
use App\Entity\Partnership;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/contacts/partenariats', name: 'app_back_office_contacts_partnership_')]
class AcceptController extends AbstractController
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/accepter/{id}', name: 'accept')]
    public function accept(EntityManagerInterface $entityManager,
                           MailerService          $mailerService,
                           Partnership            $partnership): Response
    {
        $partner = new Partner();
        $partner->setRoles(['ROLE_PARTNER'])
            ->setStatus('Actif')
            ->setActive(true)
            ->setEmail($partnership->getEmail())
            ->setPassword($this->passwordHasher->hashPassword($partner, 'change-moi-ca-tout-de-suite!'))
            ->setName($partnership->getName())
            ->setPhone($partnership->getPhone())
            ->setCity($partnership->getCity())
            ->setType($partnership->getPartnerType());
        $entityManager->persist($partner);
        $entityManager->remove($partnership);
        $entityManager->flush();

        $mailerService->sendEmail([
            'from' => [
                'name' => 'Bastard Sound System',
                'email' => 'contact@bastardsoundsystem.org',
                'phone' => '06 83 57 30 67',
            ],
            'to' => [
                'name' => $partner->getName(),
                'email' => $partner->getUserIdentifier(),
            ],
            'subject' => 'Bienvenue chez BSS !',
        ], 'back_office/contacts/partnership/accept/_email');

        $this->addFlash('success', "Tu as accepté la proposition de partenariat de {$partnership->getName()}&nbsp!");

        return $this->redirectToRoute('app_back_office_contacts_partnership_home', ['etat' => 'nouvelle'], Response::HTTP_SEE_OTHER);
    }
}
