<?php

declare(strict_types=1);

namespace App\UI\Rest;

use App\Cinema\Reservation\Application\ReservationService;
use App\Cinema\Reservation\Validator\ReservationValidator;
use App\Shared\Showing\Infrastructure\ShowingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
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

        $x = $reservationService->create($parameters);

        dump($x);

        return new Response(
            '<html><body>test</body></html>'
        );
    }
}