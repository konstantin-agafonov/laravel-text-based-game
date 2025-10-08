<?php

namespace App\Modules\Play\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Play\Data\PlayData;
use App\Modules\Play\Services\PlayService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Play controller.
 * 
 * Handles HTTP requests for game play operations.
 */
class PlayController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param PlayService $service The play service instance
     */
    public function __construct(
        private readonly PlayService $service
    )
    {
    }

    /**
     * Process a player's move and return game response.
     *
     * @param PlayData $playData The player's move data
     * @return JsonResponse JSON response with game state
     */
    public function play(PlayData $playData): JsonResponse
    {
        $response = $this->service->play($playData);

        return response()->json($response, Response::HTTP_OK);
    }
}
