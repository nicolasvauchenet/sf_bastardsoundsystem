<?php

namespace App\AdminBundle\Controller\Cotisation;

use App\AdherentBundle\Entity\Adherent;
use App\AdminBundle\Service\Statistics\CotisationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/gestion/cotisations', name: 'admin_gestion_cotisations_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(): Response
    {
        return $this->render('@Admin/gestion/cotisations/index.html.twig');
    }
}
