<?php

namespace App\Controller\FrontOffice\Label;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/le-booking', name: 'app_front_office_label_booking_')]
class BookingController extends AbstractController
{
    #[Route('/tes-concerts', name: 'gig')]
    public function gig(): Response
    {
        return $this->render('front_office/label/booking/gig.html.twig');
    }

    #[Route('/tes-tournees', name: 'tour')]
    public function tour(): Response
    {
        return $this->render('front_office/label/booking/tour.html.twig');
    }

    #[Route('/tes-contrats-et-tes-assurances', name: 'contracts')]
    public function contracts(): Response
    {
        return $this->render('front_office/label/booking/contracts.html.twig');
    }
}
