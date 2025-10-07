<?php

namespace App\Modules\Flight\Http\Requests;

use App\Modules\Region\Models\Region;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Обработчик запроса полётов.
 *
 * @property string|null $datefrom Дата от
 * @property string|null $dateto Дата до
 * @property int|null $regions Идентификаторы регионов
 */
class FlightsRequest extends FormRequest
{
    /**
     * Возвращает правила валидации.
     *
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'datefrom' => ['nullable', 'date', 'date_format:Y-m-d'],
            'dateto' => ['nullable', 'date', 'date_format:Y-m-d'],
            'regions.*' => ['nullable', 'integer', 'exists:' . Region::class . ',id'],
        ];
    }
}
