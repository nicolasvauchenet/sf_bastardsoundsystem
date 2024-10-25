<?php

namespace App\Service\BackOffice;

use App\Repository\EngagementRepository;

class EngagementService
{
    private EngagementRepository $engagementRepository;

    public function __construct(EngagementRepository $engagementRepository)
    {
        $this->engagementRepository = $engagementRepository;
    }

    public function getByStatus(string $status): array
    {
        return $this->engagementRepository->findBy(['status' => $status], ['sentAt' => 'DESC']);
    }
}
