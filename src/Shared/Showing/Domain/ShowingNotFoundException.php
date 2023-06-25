<?php

declare(strict_types=1);

namespace App\Shared\Showing\Domain;

class ShowingNotFoundException extends \RuntimeException
{
    public static function forId(int $id)
    {
        return new self(sprintf("Showing not found for given ID: %d", $id));
    }
}