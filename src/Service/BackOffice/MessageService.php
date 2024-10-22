<?php

namespace App\Service\BackOffice;

use App\Repository\MessageRepository;

class MessageService
{
    private MessageRepository $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function getByStatus(string $status): array
    {
        return $this->messageRepository->findBy(['status' => $status], ['sentAt' => 'DESC']);
    }
}
