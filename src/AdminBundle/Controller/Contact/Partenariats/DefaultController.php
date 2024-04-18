<?php

namespace App\AdminBundle\Controller\Contact\Partenariats;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/partenariats', name: 'admin_contact_partenariats_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(): Response
    {
        return $this->render('@Admin/contact/partenariats/index.html.twig');
    }
}
