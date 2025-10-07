<?php

namespace App\Modules\Region\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Коллекция регионов.
 */
class RegionCollection extends ResourceCollection
{
    /**
     * Преобразует коллекцию ресурсов в массив.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}
