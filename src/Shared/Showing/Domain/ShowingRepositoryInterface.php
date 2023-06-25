<?php

declare(strict_types=1);

namespace App\Shared\Showing\Domain;

interface ShowingRepositoryInterface
{
    public function add(Showing $showing): void;

    public function get(int $id): Showing;

    public  function remove(int $id): void;
}