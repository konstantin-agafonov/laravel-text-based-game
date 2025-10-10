<?php declare(strict_types=1);

namespace App\Modules\Play\Services;

use App\Modules\Play\Data\PlayData;

/**
 * Play service.
 * 
 * Handles business logic for game play operations.
 */
class PlayService
{

    /**
     * Process a player's move and return game response.
     *
     * @param PlayData $playData The player's move data
     * @return array<string, mixed> The game response data
     */
    public function play(PlayData $playData): array
    {
        return [
            'your_move' => $playData->move
        ];
    }
}
