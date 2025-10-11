<?php

namespace App\Modules\Play\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Play\Data\GameData;
use App\Modules\Play\Http\Resources\GameCollection;
use App\Modules\Play\Http\Resources\GameResource;
use App\Modules\Play\Models\Game;
use App\Modules\Play\Services\GameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Games controller.
 *
 * Handles HTTP requests for gabe-related operations including
 * listing, viewing, creating, updating, and deleting cities.
 */
class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param GameService $service The Game service instance
     */
    public function __construct(
        private readonly GameService $service
    )
    {
    }

    /**
     * Display a listing of cities.
     *
     * @return GameCollection A collection of Game resources
     */
    public function index(): GameCollection
    {
        return GameCollection::make($this->service->getGames());
    }

    /**
     * Display the specified Game.
     *
     * @param Game $Game The Game model instance
     * @return GameResource The Game resource
     */
    public function show(Game $Game): GameResource
    {
        return new GameResource($Game);
    }

    /**
     * Store a newly created Game.
     *
     * @param GameData $gameData Game data
     * @return JsonResponse JSON response with created Game data
     */
    public function store(GameData $gameData): JsonResponse
    {
        return response()->json(
            GameResource::make(Game::create($gameData)),
            Response::HTTP_CREATED
        );
    }

    /**
     * Update the specified Game.
     *
     * @param GameData $gameData Game data
     * @param Game $game Game
     * @return GameResource JSON response with updated Game data
     */
    public function update(GameData $gameData, Game $game): GameResource
    {
        return GameResource::make($game->update($gameData));
    }

    /**
     * Remove the specified Game.
     *
     * @param Game $game Game
     * @return JsonResponse Empty JSON response with 204 status
     */
    public function destroy(Game $game): JsonResponse
    {
        $game->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
