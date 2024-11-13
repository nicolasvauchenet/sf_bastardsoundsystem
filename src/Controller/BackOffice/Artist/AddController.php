<?php

namespace App\Controller\BackOffice\Artist;

use App\Entity\Artist;
use App\Form\ArtistType;
use App\Service\FileUploaderService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/administration/artistes', name: 'app_back_office_artist_')]
class AddController extends AbstractController
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    #[Route('/nouvel-artiste', name: 'add')]
    public function index(Request                $request,
                          EntityManagerInterface $entityManager,
                          FileUploaderService    $fileUploader,
                          SluggerInterface       $slugger): Response
    {
        $artist = (new Artist())
            ->setRoles(['ROLE_ARTIST'])
            ->setStatus('Attente de cotisation')
            ->setActive(true);
        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $artist->setPassword($this->passwordHasher->hashPassword($artist, $form->get('password')->getData()));

            /** @var UploadedFile $logoFile */
            $logoFile = $form->get('logo')->getData();
            if($logoFile) {
                $logoFileName = $fileUploader->upload($logoFile, 'artist/' . strtolower($slugger->slug($artist->getName())), strtolower($slugger->slug($artist->getName())) . '-logo');
                $artist->setLogo($logoFileName);
            }

            /** @var UploadedFile $photoLiveFile */
            $photoLiveFile = $form->get('photoLive')->getData();
            if($photoLiveFile) {
                $photoLiveFileName = $fileUploader->upload($photoLiveFile, 'artist/' . strtolower($slugger->slug($artist->getName())), strtolower($slugger->slug($artist->getName())) . '-live');
                $artist->setPhotoLive($photoLiveFileName);
            }

            /** @var UploadedFile $photoBandFile */
            $photoBandFile = $form->get('photoBand')->getData();
            if($photoBandFile) {
                $photoBandFileName = $fileUploader->upload($photoBandFile, 'artist/' . strtolower($slugger->slug($artist->getName())), strtolower($slugger->slug($artist->getName())) . '-band');
                $artist->setPhotoBand($photoBandFileName);
            }

            $entityManager->persist($artist);
            $entityManager->flush();
            $this->addFlash('success', "Tu as ajouté l'artiste {$artist->getName()}");

            return $this->redirectToRoute('app_back_office_artist_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('back_office/artist/add/index.html.twig', [
            'form' => $form->createView(),
        ], new Response(null, $form->isSubmitted() && !$form->isValid() ? 422 : 200));
    }
}
