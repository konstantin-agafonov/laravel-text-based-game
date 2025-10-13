<?php

namespace App\Modules\Play\Http\Resources;

use App\Modules\Play\Enums\GameStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Game resource class.
 *
 * Transforms game model data into API-friendly format.
 *
 * @property int $id Game identifier
 * @property string $name Game name
 * @property string|null $description Game description
 * @property int $user_id Author user ID
 * @property int $category_id Category identifier
 * @property array|null $scenario Game scenario data
 * @property GameStatus|null $status Game status
 * @property Carbon $created_at Creation timestamp
 * @property Carbon $updated_at Last update timestamp
 *
 */
class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request The HTTP request instance
     * @return array<string, mixed> The transformed game data
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'description'   => $this->description,
            'user_id'       => $this->user_id,
            'category_id'   => $this->category_id,
            'scenario'      => $this->scenario,
            'status'        => $this->status?->value,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
