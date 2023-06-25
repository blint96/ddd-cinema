<?php

declare(strict_types=1);

namespace App\Cinema\Reservation\Domain;

interface ReservationRepositoryInterface
{
    public function add(Reservation $reservation): void;

    public function get(int $id): Reservation;

    public  function remove(int $id): void;
}