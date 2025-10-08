<?php declare(strict_types=1);

namespace App\Modules\Play\Services;

use App\Modules\Play\Data\PlayData;

class PlayService
{

    /**
     * Forms and returns response to player's move
     *
     * @param PlayData $playData
     * @return array
     */
    public function play(PlayData $playData): array
    {
        return [
            'your_move' => $playData->move
        ];
    }
}
