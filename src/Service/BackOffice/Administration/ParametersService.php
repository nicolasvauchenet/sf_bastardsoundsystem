<?php

namespace App\Service\BackOffice\Administration;

use App\Entity\BackOffice\Administration\Parameters\Parameters;
use App\Repository\BackOffice\Administration\Parameters\ParametersRepository;

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

    public function getMembershipFee(): ?float
    {
        $this->loadParameters();

        return $this->parameters->getAppMembershipFee();
    }
}
