<?php

namespace App\Modules\Play\Data;

use Spatie\LaravelData\Attributes\Validation\Exists;
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
        public readonly string $name,
        #[Exists('users')]
        public readonly int $user_id,
    ) {
    }
}
