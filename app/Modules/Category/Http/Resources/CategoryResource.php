<?php

namespace App\Modules\Category\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Category resource class.
 *
 * Transforms Category model data into API-friendly format.
 *
 * @property int $id Category identifier
 * @property string $name Category name
 */
class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request The HTTP request instance
     * @return array<string, mixed> The transformed Category data
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
        ];
    }
}
