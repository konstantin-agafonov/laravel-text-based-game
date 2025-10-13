<?php

namespace App\Modules\Play\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Game run collection resource.
 *
 * Transforms a collection of GameRun models into API-friendly format.
 */
class GameRunCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request The HTTP request instance
     * @return array<int|string, mixed> The transformed collection data
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
