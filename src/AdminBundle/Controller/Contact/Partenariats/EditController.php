<?php

namespace App\AdminBundle\Controller\Contact\Partenariats;

use App\AdminBundle\Form\Contact\PartenariatType;
use App\FrontOfficeBundle\Entity\Partenariat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/contact/partenariats', name: 'admin_contact_partenariats_')]
class EditController extends AbstractController
{
    #[Route('/modifier/{id}', name: 'edit')]
    public function edit(Request                $request,
                         EntityManagerInterface $entityManager,
                         Partenariat            $partenariat): Response
    {
        $form = $this->createForm(PartenariatType::class, $partenariat);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($partenariat);
            $entityManager->flush();

            $this->addFlash('success', "Vous avez modifé la demande de partenariat de {$partenariat->getPartenaireName()}");

            return $this->redirectToRoute('admin_contact_partenariats_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('@Admin/contact/partenariats/edit.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
