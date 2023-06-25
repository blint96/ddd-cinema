<?php

declare(strict_types=1);

namespace App\Cinema\Reservation\Domain;

use App\Cinema\Reservation\Domain\ValueObject\Seat;
use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Showing\Domain\Showing;

final class Reservation extends AggregateRoot
{
    private Showing $showing;

    /** @var array<Seat> */
    private array $seats;

    public function __construct(Showing $showing, array $seats)
    {
        $this->showing = $showing;
        $this->seats = $seats;
    }

    public function getShowing(): Showing
    {
        return $this->showing;
    }

    public function getSeats(): array
    {
        return $this->seats;
    }
}