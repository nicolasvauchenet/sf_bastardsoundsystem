<?php

namespace App\Controller\BackOffice\Crew\Member;

use App\Repository\Member\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/administration/adherents', name: 'app_back_office_crew_member_home')]
    public function index(MemberRepository $memberRepository): Response
    {
        return $this->render('back_office/crew/member/default/index.html.twig', [
            'members' => $memberRepository->findAll(),
            'activeMembers' => $memberRepository->findBy(['active' => true]),
            'inactiveMembers' => $memberRepository->findBy(['active' => false]),
        ]);
    }
}
