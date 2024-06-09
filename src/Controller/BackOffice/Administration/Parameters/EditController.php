<?php

namespace App\Controller\BackOffice\Administration\Parameters;

use App\Entity\BackOffice\Administration\Parameters\Parameters;
use App\Form\BackOffice\Administration\Parameters\ParametersType;
use App\Repository\BackOffice\Administration\Parameters\ParametersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EditController extends AbstractController
{
    #[Route('/administration/parametres', name: 'app_back_office_administration_parameters_edit')]
    public function index(ParametersRepository   $parametersRepository,
                          Request                $request,
                          EntityManagerInterface $entityManager): Response
    {
        $parameters = $parametersRepository->find(1);
        if(!$parameters) {
            $parameters = new Parameters();
        }

        $form = $this->createForm(ParametersType::class, $parameters);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($parameters);
            $entityManager->flush();

            $this->addFlash('success', "Les paramètres de l'application ont été sauvegardés !");

            return $this->redirectToRoute('app_back_office_administration_parameters_edit', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/administration/parameters/edit/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
