<?php

declare(strict_types=1);

namespace App\Cinema\Reservation\Application;

use App\Cinema\Reservation\Domain\ReservationBuilder;
use App\Cinema\Reservation\Domain\ReservationRepositoryInterface;

class ReservationService
{
    public function __construct(
        private readonly ReservationBuilder $reservationBuilder,
        private readonly ReservationRepositoryInterface $reservationRepository
    ) {
    }

    public function create(array $reservationData) /** response? */
    {
        try {
            $reservation = $this->reservationBuilder->buildFromArray(
                $reservationData
            );

            $this->reservationRepository->add($reservation);
            // $this->eventPublisher->publish($payment->pullEvents());
            return $reservation;
        } catch (\Exception $exception) {
            // log exception
        }

        // return failure response
        return $reservation; // todo: write failure response
    }
}
