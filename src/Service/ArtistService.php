<?php

namespace App\Service;

use App\Repository\ArtistRepository;

class ArtistService
{
    private ArtistRepository $artistRepository;

    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function getAllArtists(): array
    {
        return $this->artistRepository->findBy(['active' => true], ['name' => 'ASC']);
    }

    public function getGenres(): array
    {
        return $this->artistRepository->findAllGenres();
    }

    public function getDepartments(): array
    {
        return $this->artistRepository->findAllDepartments();
    }

    public function getCities(): array
    {
        return $this->artistRepository->findAllCities();
    }
}