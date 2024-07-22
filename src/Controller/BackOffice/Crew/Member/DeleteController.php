<?php

namespace App\Controller\BackOffice\Crew\Member;

use App\Entity\Member\Member;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DeleteController extends AbstractController
{
    #[Route('/administration/membres/supprimer/{id}', name: 'app_back_office_crew_member_delete')]
    public function delete(FileUploaderService    $fileUploaderService,
                           EntityManagerInterface $entityManager,
                           Member                 $member): Response
    {
        if($member->getLogo()) {
            $fileUploaderService->remove('member', $member->getLogo());
        }

        $entityManager->remove($member);
        $entityManager->flush();

        $this->addFlash('danger', "L'adhérent {$member->getFullname()} a été supprimé !");

        return $this->redirectToRoute('app_back_office_crew_member_home');
    }

    #[Route('/administration/membres/logo/supprimer/{id}', name: 'app_back_office_crew_member_logo_delete')]
    public function imageDelete(FileUploaderService    $fileUploaderService,
                                EntityManagerInterface $entityManager,
                                Member                 $member): Response
    {
        if($member->getLogo()) {
            $fileUploaderService->remove('member', $member->getLogo());
            $member->setLogo(null);
        }

        $entityManager->persist($member);
        $entityManager->flush();

        $this->addFlash('danger', "Le logo de l'adhérent {$member->getFullname()} a été supprimé !");

        return $this->redirectToRoute('app_back_office_crew_member_view', ['id' => $member->getId()]);
    }
}
