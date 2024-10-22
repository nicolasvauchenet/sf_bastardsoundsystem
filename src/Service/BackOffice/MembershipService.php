<?php

namespace App\Service\BackOffice;

use App\Repository\MembershipRepository;

class MembershipService
{
    private MembershipRepository $membershipRepository;

    public function __construct(MembershipRepository $membershipRepository)
    {
        $this->membershipRepository = $membershipRepository;
    }

    public function getByStatus(string $status): array
    {
        return $this->membershipRepository->findBy(['status' => $status], ['sentAt' => 'DESC']);
    }
}
