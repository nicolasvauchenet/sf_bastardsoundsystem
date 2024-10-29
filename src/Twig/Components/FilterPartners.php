<?php

namespace App\Twig\Components;

use App\Repository\PartnerRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('FilterPartners', template: 'components/filter_partners.html.twig')]
class FilterPartners
{
    use DefaultActionTrait;

    private PartnerRepository $partnerRepository;

    #[LiveProp(writable: true)]
    public string $occupation = '';

    #[LiveProp(writable: true)]
    public string $specialty = '';

    #[LiveProp(writable: true)]
    public string $department = '';

    #[LiveProp(writable: true)]
    public string $city = '';

    public function __construct(PartnerRepository $partnerRepository)
    {
        $this->partnerRepository = $partnerRepository;
    }

    public function getPartners(): array
    {
        if($this->specialty === '' && $this->occupation === '' && $this->department === '' && $this->city === '') {
            return $this->partnerRepository->findBy(['active' => true]);
        }

        return $this->partnerRepository->findByFilters($this->specialty, $this->occupation, $this->department, $this->city);
    }
}
