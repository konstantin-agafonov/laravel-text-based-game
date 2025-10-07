<?php

namespace App\Modules\Flight\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Класс ресурса.
 *
 * @property int $id Идентификатор
 */
class FlightResource extends JsonResource
{
    /**
     * Преобразовывает ресурс в массив.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'sid'       => $this->sid,
            'reg'       => $this->reg,
            'dep'       => $this->dep,
            'dest'      => $this->dest,
            'eet'       => $this->eet,
            'zona'      => $this->zona,
            'typ'       => $this->typ,
            'dof'       => $this->dof,
            'folder'    => $this->folder,
            'dep_time'  => $this->dep_time,
            'arr_time'  => $this->arr_time,
            'region_id' => $this->region_id,
        ];
    }
}
