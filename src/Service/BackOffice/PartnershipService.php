<?php

namespace App\Service\BackOffice;

use App\Repository\PartnershipRepository;

class PartnershipService
{
    private PartnershipRepository $partnershipRepository;

    public function __construct(PartnershipRepository $partnershipRepository)
    {
        $this->partnershipRepository = $partnershipRepository;
    }

    public function getByStatus(string $status): array
    {
        return $this->partnershipRepository->findBy(['status' => $status], ['sentAt' => 'DESC']);
    }
}
