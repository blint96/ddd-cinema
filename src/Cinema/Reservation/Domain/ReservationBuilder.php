<?php

declare(strict_types=1);

namespace App\Cinema\Reservation\Domain;
use App\Cinema\Reservation\Domain\ValueObject\Seat;
use App\Shared\Showing\Domain\ShowingRepositoryInterface;

class ReservationBuilder
{
    public function __construct(
        private readonly ShowingRepositoryInterface $showingRepository
    ) {
    }

    public function buildFromArray(array $args): Reservation
    {
        $showing = $this->showingRepository->get($args['showing']);
        $seats = [];

        foreach($args['seats'] as $seatId) {
            $seats[] = new Seat($seatId);
        }

        return new Reservation(
            $showing,
            $seats
        );
    }
}