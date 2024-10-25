<?php

namespace App\Controller\BackOffice\Engagement;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/propositions-de-booking', name: 'app_back_office_engagement_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'home')]
    public function index(): Response
    {
        return $this->render('back_office/engagement/default/index.html.twig');
    }
}
