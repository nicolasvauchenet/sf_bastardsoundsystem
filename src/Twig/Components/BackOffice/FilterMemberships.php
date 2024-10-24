<?php

namespace App\Twig\Components\BackOffice;

use App\Repository\MembershipRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Metadata\UrlMapping;

#[AsLiveComponent('FilterMemberships', template: 'back_office/components/filter_memberships.html.twig')]
class FilterMemberships
{
    use DefaultActionTrait;

    private MembershipRepository $membershipRepository;

    #[LiveProp(writable: true, url: new UrlMapping(as: 'etat'))]
    public string $status = '';

    public function __construct(MembershipRepository $membershipRepository)
    {
        $this->membershipRepository = $membershipRepository;
    }

    public function getMemberships(): array
    {
        if($this->status === '') {
            return $this->membershipRepository->findBy([], ['sentAt' => 'DESC']);
        }

        return $this->membershipRepository->findByFilters($this->status);
    }
}
