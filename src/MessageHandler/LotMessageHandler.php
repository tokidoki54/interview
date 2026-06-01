<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Entity\Lot;
use App\Message\LotMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;

#[AsMessageHandler]
final readonly class LotMessageHandler
{
    public function __construct(
        private ObjectMapperInterface $objectMapper,
        private EntityManagerInterface $entityManager,
    ) {
    }

    public function __invoke(LotMessage $message): void
    {
        $lot = $this->objectMapper->map($message, Lot::class);

        $this->entityManager->persist($lot);
        $this->entityManager->flush();
    }
}
