<?php

namespace App\Modules\Play\Data;

use App\Models\User;
use App\Modules\Category\Models\Category;
use App\Modules\Play\Enums\GameStatus;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

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
        public readonly string|Optional $description,
        #[Exists(User::class, 'id')]
        public readonly int $user_id,
        #[Exists(Category::class, 'id')]
        public readonly int $category_id,
        public readonly string|Optional $scenario,
        public readonly GameStatus|Optional $status,
    ) {
    }
}
