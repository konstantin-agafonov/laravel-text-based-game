<?php

namespace App\Modules\Play\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Play\Data\PlayData;
use App\Modules\Play\Services\PlayService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PlayController extends Controller
{
    /**
     * Constructor.
     *
     * @param PlayService $service Play service
     */
    public function __construct(
        private readonly PlayService $service
    )
    {
    }

    public function play(PlayData $playData): JsonResponse
    {
        $response = $this->service->play($playData);

        return response()->json($response, Response::HTTP_OK);
    }
}
