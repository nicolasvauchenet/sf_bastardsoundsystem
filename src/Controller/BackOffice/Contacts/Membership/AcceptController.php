<?php

namespace App\Controller\BackOffice\Contacts\Membership;

use App\Entity\Artist;
use App\Entity\Member;
use App\Entity\Membership;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administrations/contacts/adhesions', name: 'app_back_office_contacts_membership_')]
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
                           Membership             $membership): Response
    {
        if($membership->getMemberType() === 'Musicien' || $membership->getMemberType() === 'Groupe') {
            $member = (new Artist())
                ->setRoles(['ROLE_ARTIST']);

            if($membership->getMemberType() === 'Musicien') {
                $member->setBandmates(1)
                    ->setGenre('');
            }
            $emailTemplate = 'back_office/contacts/membership/accept/_email_artist';
        } else {
            $member = (new Member())
                ->setRoles(['ROLE_MEMBER']);
            $emailTemplate = 'back_office/contacts/membership/accept/_email_member';
        }

        $member->setStatus('Actif')
            ->setActive(true)
            ->setEmail($membership->getEmail())
            ->setPassword($this->passwordHasher->hashPassword($member, 'change-moi-ca-tout-de-suite!'))
            ->setName($membership->getName())
            ->setPhone($membership->getPhone())
            ->setCity($membership->getCity());
        $entityManager->persist($member);
        $entityManager->remove($membership);
        $entityManager->flush();

        $mailerService->sendEmail([
            'from' => [
                'name' => 'Bastard Sound System',
                'email' => 'contact@bastardsoundsystem.org',
                'phone' => '06 83 57 30 67',
            ],
            'to' => [
                'name' => $member->getName(),
                'email' => $member->getUserIdentifier(),
            ],
            'subject' => 'Bienvenue chez BSS !',
        ], $emailTemplate);

        $this->addFlash('success', "Tu as accepté la demande d'adhésion de {$membership->getName()}&nbsp!");

        return $this->redirectToRoute('app_back_office_contacts_membership_home', ['etat' => 'nouvelle'], Response::HTTP_SEE_OTHER);
    }
}
