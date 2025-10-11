<?php

namespace App\Modules\Play\Data;

use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;

/**
 * Game data transfer object.
 *
 * Contains data for game.
 *
 * @property string $name Game name
 * @property string $user_id Game author user ID
 */
class GameData extends Data
{
    /**
     * Create a new GameData instance.
     *
     * @param string $name Game name
     * @param int $user_id Game author user ID
     */
    public function __construct(
        #[Unique('games', 'name, user_id')]
        public string $name,
        #[Exists('users')]
        public int $user_id,
    ) {
    }
}
