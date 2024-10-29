<?php

namespace App\Controller\BackOffice\Engagement;

use App\Entity\Engagement;
use App\Entity\Promoter;
use App\Form\EngagementType;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/administration/propositions-de-booking', name: 'app_back_office_engagement_')]
class AcceptController extends AbstractController
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/accepter/{id}', name: 'accept')]
    public function accept(Request                $request,
                           EntityManagerInterface $entityManager,
                           MailerService          $mailerService,
                           Engagement             $engagement): Response
    {
        $engagementBefore = $engagement;
        $form = $this->createForm(EngagementType::class, $engagement);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $engagement->setName($engagement->getName())
                ->setArtist($engagementBefore->getArtist())
                ->setMessage($engagementBefore->getMessage())
                ->setStatus('Conclue')
                ->setConcludedAt(new \DateTimeImmutable());

            if(!$engagement->getPromoter()) {
                $promoter = new Promoter();
                $promoter->setEmail($engagement->getEmail())
                    ->setPassword($this->passwordHasher->hashPassword($promoter, '!bEb7RgDFJM?'))
                    ->setName($engagement->getName())
                    ->setRoles(['ROLE_PROMOTER'])
                    ->setActive(true)
                    ->setStatus('Actif')
                    ->setPhone($engagement->getPhone())
                    ->setOrganization($engagement->getOrganization())
                    ->setCity($engagement->getCity());
                $entityManager->persist($promoter);
                $engagement->setPromoter($promoter);
            }
            $entityManager->persist($engagement);
            $entityManager->flush();

            $mailerService->sendEmail([
                'from' => [
                    'name' => 'Bastard Sound System',
                    'email' => 'contact@bastardsoundsystem.org',
                    'phone' => '06 83 57 30 67',
                ],
                'to' => [
                    'name' => $engagement->getName(),
                    'email' => $engagement->getEmail(),
                ],
                'subject' => $engagement->getArtist()->getName() . ' vient jouer chez toi',
                'engagement' => $engagement,
            ], 'back_office/engagement/accept/_email');

            $this->addFlash('success', "Tu as accepté la proposition d'engagement de {$engagement->getName()}&nbsp!");

            return $this->redirectToRoute('app_back_office_engagement_home', ['etat' => 'conclue'], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/engagement/accept/index.html.twig', [
            'form' => $form->createView(),
            'engagement' => $engagement,
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
