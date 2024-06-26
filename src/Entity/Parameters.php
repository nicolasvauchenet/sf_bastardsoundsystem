<?php

namespace App\Entity;

use App\Repository\ParametersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParametersRepository::class)]
class Parameters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $appName = null;

    #[ORM\Column(length: 255)]
    private ?string $appEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $appPhone = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $appMembershipFee = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppName(): ?string
    {
        return $this->appName;
    }

    public function setAppName(string $appName): static
    {
        $this->appName = $appName;

        return $this;
    }

    public function getAppEmail(): ?string
    {
        return $this->appEmail;
    }

    public function setAppEmail(string $appEmail): static
    {
        $this->appEmail = $appEmail;

        return $this;
    }

    public function getAppPhone(): ?string
    {
        return $this->appPhone;
    }

    public function setAppPhone(string $appPhone): static
    {
        $this->appPhone = $appPhone;

        return $this;
    }

    public function getAppMembershipFee(): ?string
    {
        return $this->appMembershipFee;
    }

    public function setAppMembershipFee(string $appMembershipFee): static
    {
        $this->appMembershipFee = $appMembershipFee;

        return $this;
    }
}
