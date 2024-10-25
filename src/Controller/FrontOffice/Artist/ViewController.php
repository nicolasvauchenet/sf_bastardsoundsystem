<?php

namespace App\Controller\FrontOffice\Artist;

use App\Entity\Artist;
use App\Entity\Engagement;
use App\Form\EngagementType;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/les-artistes-du-label', name: 'app_front_office_artist_')]
class ViewController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/{slug}', name: 'details')]
    public function index(Request                $request,
                          EntityManagerInterface $entityManager,
                          MailerService          $mailerService,
                          Artist                 $artist): Response
    {
        $engagement = (new Engagement());
        $form = $this->createForm(EngagementType::class, $engagement);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $engagement->setArtist($artist)
                ->setStatus('Nouvelle');
            $entityManager->persist($engagement);
            $entityManager->flush();

            $mailerService->sendEmail([
                'from' => [
                    'name' => $engagement->getName(),
                    'organization' => $engagement->getOrganization(),
                    'email' => $engagement->getEmail(),
                    'phone' => $engagement->getPhone(),
                    'city' => $engagement->getCity(),
                ],
                'to' => [
                    'name' => 'Bastard Sound System',
                    'email' => 'contact@bastardsoundsystem.org',
                ],
                'placeType' => $engagement->getPlaceType(),
                'startAt' => $engagement->getStartAt(),
                'budget' => $engagement->getBudget(),
                'subject' => 'Nouvelle demande de booking',
                'message' => $engagement->getMessage(),
            ], 'front_office/artist/engage/_email');

            $this->addFlash('success', 'Merci pour ta demande de booking ! On te rappelle fissa !');

            return $this->redirectToRoute('app_front_office_artist_details', [
                'slug' => $artist->getSlug(),
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front_office/artist/view/index.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
