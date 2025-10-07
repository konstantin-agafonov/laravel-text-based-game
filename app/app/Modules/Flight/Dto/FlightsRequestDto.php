<?php

namespace App\Modules\Flight\Dto;

use Carbon\Carbon;

/**
 * DTO запроса полётов.
 */
final class FlightsRequestDto
{
    /**
     * @param Carbon|null $datefrom Дата от
     * @param Carbon|null $dateto Дата до
     * @param array|null $regions Идентификаторы регионов
     */
    public function __construct(
        public readonly Carbon|null $datefrom,
        public readonly Carbon|null $dateto,
        public readonly array|null $regions,
    )
    {
    }
}
