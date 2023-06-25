<?php

namespace App\Shared\Showing\Domain;

use App\Shared\Domain\Aggregate\AggregateRoot;

class Showing extends AggregateRoot
{
    public function __construct(
        protected readonly int $id,
        protected readonly string $title,
        protected readonly int $start
    ) { 
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getStart(): int
    {
        return $this->start;
    }
}