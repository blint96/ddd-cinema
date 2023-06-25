<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Bus\Command;
use App\Shared\Domain\Bus\Command\Command;
use App\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\MessageBusInterface;

final class InMemorySymfonyCommandBus implements CommandBus
{
    private readonly MessageBus $bus;

    public function __construct(private readonly MessageBusInterface $messageBus)
    {
        $this->bus = $messageBus;
    }

    public function dispatch(Command $command): void 
    {
        $this->bus->dispatch($command);
    }
}