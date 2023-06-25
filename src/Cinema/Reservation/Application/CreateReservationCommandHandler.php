<?php

declare(strict_types=1);

namespace App\Cinema\Reservation\Application;

use App\Shared\Domain\Bus\Command\CommandHandler;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class CreateReservationCommandHandler implements CommandHandler
{
    public function __construct(private readonly ReservationService $service) {
    }

    public function __invoke(CreateReservationCommand $command): void
    {
        $this->service->create($command->getBody());
    }
}