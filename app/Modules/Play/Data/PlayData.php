<?php

namespace App\Modules\Play\Data;

use Spatie\LaravelData\Data;

/**
 * Play data transfer object.
 * 
 * Contains data for player moves in the game.
 *
 * @property string $move The player's move
 */
class PlayData extends Data
{
    /**
     * Create a new PlayData instance.
     *
     * @param string $move The player's move
     */
    public function __construct(
        public string $move,
        /*public ?CarbonImmutable $published_at*/
    ) {
    }
}
