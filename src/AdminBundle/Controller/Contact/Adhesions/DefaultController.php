<?php

namespace App\AdminBundle\Controller\Contact\Adhesions;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/adhesions', name: 'admin_contact_adhesions_')]
class DefaultController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(): Response
    {
        return $this->render('@Admin/contact/adhesions/index.html.twig');
    }
}
