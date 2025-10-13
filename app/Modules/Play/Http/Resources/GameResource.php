<?php

namespace App\Modules\Play\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Game resource class.
 *
 * Transforms game model data into API-friendly format.
 *
 * @property int $id Game identifier
 * @property string $name Game name
 * @property int $user_id Author user ID
 */
class GameResource extends JsonResource
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
            'name'          => $this->name,
            'user_id'       => $this->user_id,
        ];
    }
}
