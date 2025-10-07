<?php

namespace App\Modules\Flight\Dto;

use App\Dto\AbstractRequestTransformer;
use App\Modules\Flight\Http\Requests\FlightsRequest;
use Carbon\Carbon;

/**
 * Трансформер запроса полётов.
 */
class FlightsRequestTransformer extends AbstractRequestTransformer
{
    /**
     * Трансформирует реквест в dto.
     *
     * @param FlightsRequest $request Обработчик запроса обратного звонка
     * @return FlightsRequestDto
     */
    public function transform(FlightsRequest $request): FlightsRequestDto
    {
        /*$this->assertFieldExist('name', $request);
        $this->assertFieldExist('phone', $request);*/

        return new FlightsRequestDto(
            $request->datefrom ? Carbon::parse($request->datefrom) : null,
            $request->dateto ? Carbon::parse($request->dateto) : null,
            $request->regions,
        );
    }
}
