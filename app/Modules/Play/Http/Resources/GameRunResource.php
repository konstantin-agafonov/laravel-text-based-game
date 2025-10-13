<?php

namespace App\Modules\Play\Http\Resources;

use App\Modules\Play\Enums\GameRunStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Game run resource class.
 *
 * Transforms GameRun model data into API-friendly format.
 *
 * @property int $id Game run identifier
 * @property GameRunStatus $status Game run status
 * @property int $game_id Game identifier
 * @property int $user_id Game player identifier
 * @property Carbon $started_at Start timestamp
 * @property Carbon|null $finished_at Finish timestamp
 * @property Carbon $created_at Creation timestamp
 */
class GameRunResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request The HTTP request instance
     * @return array<string, mixed> The transformed city data
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'status'        => $this->status?->value,
            'game_id'       => $this->game_id,
            'user_id'       => $this->user_id,
            'started_at'    => $this->started_at,
            'finished_at'   => $this->finished_at,
            'created_at'    => $this->created_at,
        ];
    }
}
