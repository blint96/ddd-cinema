<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Common;

use App\Shared\Domain\Bus\Command\Command;
use App\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


abstract class ApiController extends AbstractController
{
    public function __construct(private readonly CommandBus $commandBus) { 
    }

    protected function dispatch(Command $command): void 
    {
        $this->commandBus->dispatch($command);
    }
}