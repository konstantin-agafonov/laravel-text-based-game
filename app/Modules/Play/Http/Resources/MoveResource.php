<?php

namespace App\Modules\Play\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Move resource class.
 *
 * Transforms Move model data into API-friendly format.
 *
 * @property int $id Move identifier
 * @property int $gamerun_id Game run identifier
 * @property string $scene Scene before move
 * @property string $move Move player input
 */
class MoveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request The HTTP request instance
     * @return array<string, mixed> The transformed move data
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'gamerun_id'    => $this->gamerun_id,
            'scene'         => $this->scene,
            'move'          => $this->move,
            'created_at'    => $this->created_at,
        ];
    }
}


