<?php

declare(strict_types=1);

namespace App\UI\Rest;

use App\Cinema\Reservation\Application\CreateReservationCommand;
use App\Cinema\Reservation\Application\ReservationService;
use App\Cinema\Reservation\Validator\ReservationValidator;
use App\Shared\Infrastructure\Common\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends ApiController
{
    #[Route('/api/reservation', name: 'app_reservation_create', methods: ['POST'])]
    public function createAction(
        ReservationService $reservationService,
        ReservationValidator $validator,
        Request $request
    ): Response
    {
        $parameters = json_decode($request->getContent(), true);

        $validator->validate($parameters);

        $this->dispatch(new CreateReservationCommand($parameters));

        return new Response(
            '<html><body>test</body></html>'
        );
    }
}