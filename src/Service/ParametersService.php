<?php

namespace App\Service;

use App\Entity\Parameters;
use App\Repository\ParametersRepository;

class ParametersService
{
    private ?Parameters $parameters = null;
    private ?ParametersRepository $parametersRepository;

    public function __construct(ParametersRepository $parametersRepository)
    {
        $this->parametersRepository = $parametersRepository;
    }

    private function loadParameters(): void
    {
        if($this->parameters === null) {
            $this->parameters = $this->parametersRepository->find(1);
        }
    }

    public function getAppName(): ?string
    {
        $this->loadParameters();

        return $this->parameters->getAppName();
    }

    public function getAppEmail(): ?string
    {
        $this->loadParameters();

        return $this->parameters->getAppEmail();
    }

    public function getAppPhone(): ?string
    {
        $this->loadParameters();

        return $this->parameters->getAppPhone();
    }
}
