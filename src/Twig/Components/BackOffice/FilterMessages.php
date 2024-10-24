<?php

namespace App\Twig\Components\BackOffice;

use App\Repository\MessageRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\LiveComponent\Metadata\UrlMapping;

#[AsLiveComponent('FilterMessages', template: 'back_office/components/filter_messages.html.twig')]
class FilterMessages
{
    use DefaultActionTrait;

    private MessageRepository $messageRepository;

    #[LiveProp(writable: true, url: new UrlMapping(as: 'etat'))]
    public string $status = '';

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function getMessages(): array
    {
        if($this->status === '') {
            return $this->messageRepository->findBy([], ['sentAt' => 'DESC']);
        }

        return $this->messageRepository->findByFilters($this->status);
    }
}
