<?php

namespace App\Twig\Components\BackOffice;

use App\Repository\PartnershipRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Metadata\UrlMapping;

#[AsLiveComponent('FilterPartnerships', template: 'back_office/components/filter_partnerships.html.twig')]
class FilterPartnerships
{
    use DefaultActionTrait;

    private PartnershipRepository $partnershipRepository;

    #[LiveProp(writable: true, url: new UrlMapping(as: 'etat'))]
    public string $status = '';

    public function __construct(PartnershipRepository $partnershipRepository)
    {
        $this->partnershipRepository = $partnershipRepository;
    }

    public function getPartnerships(): array
    {
        if($this->status === '') {
            return $this->partnershipRepository->findBy([], ['sentAt' => 'DESC']);
        }

        return $this->partnershipRepository->findByFilters($this->status);
    }
}
