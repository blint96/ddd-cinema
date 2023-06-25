<?php

declare(strict_types=1);

namespace App\Shared\Showing\Infrastructure;

use App\Shared\Showing\Domain\Showing;
use App\Shared\Showing\Domain\ShowingNotFoundException;
use App\Shared\Showing\Domain\ShowingRepositoryInterface;
use Doctrine\DBAL\Connection;

class ShowingRepository implements ShowingRepositoryInterface
{
    public function __construct(private readonly Connection $connection) {
    }

    public function add(Showing $showing): void
    {

    }

    public function get(int $id): Showing
    {
        $stmt = $this->connection->prepare(sprintf("SELECT id, title, start FROM showing WHERE id = :showingId"));
        $stmt->bindValue('showingId', $id);

        $result = $stmt->executeQuery();
        $data = $result->fetchAssociative();

        if(false === $data) {
            throw ShowingNotFoundException::forId($id);
        }

        return new Showing(
            (int) $data['id'], 
            (string) $data['title'], 
            (int) $data['start']
        );
    }

    public  function remove(int $id): void
    {

    }
}