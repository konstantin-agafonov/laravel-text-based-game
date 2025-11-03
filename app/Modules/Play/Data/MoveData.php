<?php

namespace App\Modules\Play\Data;

use App\Modules\Play\Models\GameRun;
use Spatie\LaravelData\Attributes\Validation\Exists;
use Spatie\LaravelData\Data;

/**
 * Move data transfer object.
 *
 * Contains data for move.
 *
 * @property int $gamerun_id Game run ID
 * @property string $scene Scene before move
 * @property string $move Move player input
 */
class MoveData extends Data
{
    /**
     * Create a new MoveData instance.
     *
     * @param int $gamerun_id Game run ID
     * @param string $scene Scene before move
     * @param string $move Move player input
     */
    public function __construct(
        #[Exists(GameRun::class, 'id')]
        public readonly int $gamerun_id,
        public readonly string $scene,
        public readonly string $move,
    ) {
    }
}


