<?php

declare(strict_types=1);

namespace App\Cinema\Reservation\Validator;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;


class ReservationValidator
{
    public function __construct(private readonly ValidatorInterface $validator) {
    }

    public function validate(?array $body)
    {
        $violations = $this->validator->validate($body, new Assert\Collection([
            'showing' => new Assert\Type('integer'),
            'seats' => new Assert\All([
                new Assert\Type('integer'),
                new Assert\Positive()
            ])
        ]));

        if(null === $body || $violations->count()) {
            throw new \LogicException("Validation errors.");
        }
    }
}