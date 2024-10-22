<?php

namespace App\Service;

use App\Repository\SocialRepository;

class SocialService
{
    private SocialRepository $socialRepository;

    public function __construct(SocialRepository $socialRepository)
    {
        $this->socialRepository = $socialRepository;
    }

    public function getByUser(string $slug): array
    {
        return $this->socialRepository->findByUser($slug);
    }
}
