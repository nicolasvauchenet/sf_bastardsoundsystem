<?php

namespace App\Controller\FrontOffice;

use App\Entity\Member\Membership;
use App\Form\Member\MembershipType;
use App\Service\BackOffice\Administration\ParametersService;
use App\Service\FileUploaderService;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class MembershipController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/adherez', name: 'app_front_office_membership')]
    public function index(Request                $request,
                          FileUploaderService    $fileUploaderService,
                          SluggerInterface       $slugger,
                          MailerService          $mailerService,
                          ParametersService      $parametersService,
                          EntityManagerInterface $entityManager): Response
    {
        $membership = new Membership();
        $form = $this->createForm(MembershipType::class, $membership);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $logoFile */
            $logoFile = $form->get('logo')->getData();
            if($logoFile) {
                $logoFileName = $fileUploaderService->upload($logoFile, 'member', strtolower($slugger->slug($membership->getMemberName())));
                $membership->setLogo($logoFileName);
            }

            $mailerService->sendEmail([
                'from' => [
                    'type' => $form->get('memberType')->getData(),
                    'name' => $form->get('memberName')->getData(),
                    'email' => $form->get('memberEmail')->getData(),
                    'phone' => $form->get('memberPhone')->getData(),
                ],
                'to' => [
                    'name' => $parametersService->getAppName(),
                    'email' => $parametersService->getAppEmail(),
                ],
                'subject' => "Nouvelle demande d'adhésion",
                'message' => $form->get('message')->getData(),
            ], 'front_office/membership/_email');

            $membership->setSentAt(new \DateTimeImmutable());
            $entityManager->persist($membership);
            $entityManager->flush();

            $this->addFlash('success', "Votre demande d'adhésion est envoyée ! On regarde ça et on prend contact avec vous tout bientôt");

            return $this->redirectToRoute('app_front_office_membership', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front_office/membership/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
