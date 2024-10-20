<?php

namespace App\Controller\FrontOffice\Label;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/le-label-bss', name: 'app_front_office_label_')]
class AboutController extends AbstractController
{
    #[Route('', name: 'about')]
    public function about(): Response
    {
        return $this->render('front_office/label/about/about.html.twig');
    }

    #[Route('/objectifs-et-valeurs', name: 'goals')]
    public function goals(): Response
    {
        return $this->render('front_office/label/about/goals.html.twig');
    }

    #[Route('/fonctionnement-du-label', name: 'operation')]
    public function operation(): Response
    {
        return $this->render('front_office/label/about/operation.html.twig');
    }
}
