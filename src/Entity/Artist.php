<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist extends Member
{
    #[ORM\Column]
    private ?int $bandmates = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $genre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $style = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $website = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoLive = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photoBand = null;

    public function getBandmates(): ?int
    {
        return $this->bandmates;
    }

    public function setBandmates(int $bandmates): static
    {
        $this->bandmates = $bandmates;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): static
    {
        $this->logo = $logo;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function setStyle(?string $style): static
    {
        $this->style = $style;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getPhotoLive(): ?string
    {
        return $this->photoLive;
    }

    public function setPhotoLive(?string $photoLive): static
    {
        $this->photoLive = $photoLive;

        return $this;
    }

    public function getPhotoBand(): ?string
    {
        return $this->photoBand;
    }

    public function setPhotoBand(?string $photoBand): static
    {
        $this->photoBand = $photoBand;

        return $this;
    }
}
