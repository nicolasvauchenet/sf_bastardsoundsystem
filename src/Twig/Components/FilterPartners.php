<?php

namespace App\Twig\Components;

use App\Repository\PartnerOccupationSpecialtyRepository;
use App\Repository\PartnerRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('FilterPartners', template: 'components/filter_partners.html.twig')]
class FilterPartners
{
    use DefaultActionTrait;

    private PartnerRepository $partnerRepository;
    private PartnerOccupationSpecialtyRepository $posRepository;

    #[LiveProp(writable: true, onUpdated: 'onOccupationUpdated')]
    public string $occupation = '';

    #[LiveProp(writable: true)]
    public string $specialty = '';

    #[LiveProp(writable: true)]
    public string $department = '';

    #[LiveProp(writable: true)]
    public string $city = '';

    #[LiveProp]
    public array $validSpecialties = [];

    public function __construct(PartnerRepository                    $partnerRepository,
                                PartnerOccupationSpecialtyRepository $posRepository)
    {
        $this->partnerRepository = $partnerRepository;
        $this->posRepository = $posRepository;
        $this->updateValidSpecialties();
    }

    public function onOccupationUpdated(): void
    {
        $this->updateValidSpecialties();
    }

    private function updateValidSpecialties(): void
    {
        $this->specialty = '';

        if($this->occupation !== '') {
            $this->validSpecialties = $this->posRepository->findSpecialtiesByOccupation($this->occupation);
        } else {
            $this->validSpecialties = $this->posRepository->findAllSpecialties();
        }
    }

    public function getPartners(): array
    {
        if($this->specialty === '' && $this->occupation === '' && $this->department === '' && $this->city === '') {
            return $this->partnerRepository->findBy(['active' => true], ['name' => 'ASC']);
        }

        return $this->partnerRepository->findByFilters($this->specialty, $this->occupation, $this->department, $this->city);
    }
}
