<?php

namespace App\Controller\BackOffice\Crew\Member;

use App\Entity\Member\Member;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ViewController extends AbstractController
{
    #[Route('/administration/adherents/details/{id}', name: 'app_back_office_crew_member_view')]
    public function index(Member $member): Response
    {
        return $this->render('back_office/crew/member/view/index.html.twig', [
            'member' => $member,
        ]);
    }
}
