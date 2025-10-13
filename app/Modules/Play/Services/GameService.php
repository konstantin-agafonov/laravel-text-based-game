<?php declare(strict_types=1);

namespace App\Modules\Play\Services;

use App\Modules\Play\Models\Game;
use Illuminate\Support\Facades\Auth;

/**
 * Game service.
 *
 * Handles business logic for Game-related operations.
 */
class GameService
{

    /**
     * Get a paginated list of games.
     *
     * @return mixed
     */
    public function getGames(): mixed
    {
        return Game::byUserID(Auth::id())->orderBy('name')->paginate(100);
    }
}
