<?php

namespace App\Twig\Components;

use App\Repository\ArtistRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('FilterArtists', template: 'components/filter_artists.html.twig')]
class FilterArtists
{
    use DefaultActionTrait;

    private ArtistRepository $artistRepository;

    #[LiveProp(writable: true)]
    public string $genre = '';

    #[LiveProp(writable: true)]
    public string $department = '';

    #[LiveProp(writable: true)]
    public string $city = '';

    #[LiveProp(writable: true)]
    public int $bandmates = 0;

    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function getArtists(): array
    {
        if($this->genre === '' && $this->department === '' && $this->city === '' && $this->bandmates === '') {
            return $this->artistRepository->findBy(['active' => true]);
        }

        return $this->artistRepository->findByFilters($this->genre, $this->department, $this->city, $this->bandmates);
    }
}
