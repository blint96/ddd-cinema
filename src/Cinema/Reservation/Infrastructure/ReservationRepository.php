<?php

declare(strict_types=1);

namespace App\Cinema\Reservation\Infrastructure;

use App\Cinema\Reservation\Domain\Reservation;
use App\Cinema\Reservation\Domain\ReservationRepositoryInterface;
use Doctrine\DBAL\Connection;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function __construct(private readonly Connection $connection) {
    }

    public function add(Reservation $reservation): void
    {
        $stmt = $this->connection->prepare(sprintf("INSERT INTO reservation (showing_id) VALUES (:showingId)"));
        $stmt->bindValue('showingId', $reservation->getShowing()->getId());
        $stmt->executeStatement();

        $reservationId = $this->connection->lastInsertId();

        foreach($reservation->getSeats() as $seat) {
            $stmt = $this->connection->prepare(sprintf("INSERT INTO reservation_seat (reservation_id, seat) VALUES (:reservationId, :seatId)"));
            $stmt->bindValue('reservationId', $reservationId);
            $stmt->bindValue('seatId', $seat->getId());
            $stmt->executeStatement();
        }
    }

    public function get(int $id): Reservation
    {
        
    }

    public  function remove(int $id): void
    {

    }
}