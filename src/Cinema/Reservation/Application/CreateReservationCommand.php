<?php

declare(strict_types=1);

namespace App\Cinema\Reservation\Application;

use App\Shared\Domain\Bus\Command\Command;

class CreateReservationCommand implements Command
{
    public function __construct(
        private readonly array $reservationBody
    ) {
    }

    public function getBody(): array
    {
        return $this->reservationBody;
    }
}