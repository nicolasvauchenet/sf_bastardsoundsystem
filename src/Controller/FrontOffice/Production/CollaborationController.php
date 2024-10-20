<?php

namespace App\Controller\FrontOffice\Production;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/le-partenariat', name: 'app_front_office_production_collaboration_')]
class CollaborationController extends AbstractController
{
    #[Route('/co-organisation', name: 'coorganization')]
    public function coorganization(): Response
    {
        return $this->render('front_office/production/collaboration/coorganization.html.twig');
    }

    #[Route('/co-production', name: 'coproduction')]
    public function coproduction(): Response
    {
        return $this->render('front_office/production/collaboration/coproduction.html.twig');
    }

    #[Route('/engager-un-groupe', name: 'engagement')]
    public function engagement(): Response
    {
        return $this->render('front_office/production/collaboration/engagement.html.twig');
    }
}
