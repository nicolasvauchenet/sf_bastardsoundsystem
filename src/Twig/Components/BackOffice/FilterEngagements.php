<?php

namespace App\Twig\Components\BackOffice;

use App\Repository\EngagementRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Metadata\UrlMapping;

#[AsLiveComponent('FilterEngagements', template: 'back_office/components/filter_engagements.html.twig')]
class FilterEngagements
{
    use DefaultActionTrait;

    private EngagementRepository $engagementRepository;

    #[LiveProp(writable: true, url: new UrlMapping(as: 'etat'))]
    public string $status = '';

    public function __construct(EngagementRepository $engagementRepository)
    {
        $this->engagementRepository = $engagementRepository;
    }

    public function getEngagements(): array
    {
        if($this->status === '') {
            return $this->engagementRepository->findBy([], ['sentAt' => 'ASC']);
        }

        return $this->engagementRepository->findByFilters($this->status);
    }
}
