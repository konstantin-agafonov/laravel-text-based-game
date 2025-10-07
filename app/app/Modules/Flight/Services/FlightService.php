<?php declare(strict_types=1);

namespace App\Modules\Flight\Services;

use App\Modules\Flight\Dto\FlightsRequestDto;
use App\Modules\Flight\Models\Flight;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Сервис полётов.
 */
class FlightService
{

    /**
     * Возвращает полёты.
     *
     * @param FlightsRequestDto $flightsRequestDto
     * @return LengthAwarePaginator
     */
    public function getFlights(FlightsRequestDto $flightsRequestDto): LengthAwarePaginator
    {
        $query = Flight::query();

        if ($flightsRequestDto->datefrom) {
            $query
                ->whereNotNull('dof')
                ->where(
                    'dof',
                    '>=',
                    $flightsRequestDto->datefrom->format('Y-m-d')
                );
        }

        if ($flightsRequestDto->dateto) {
            $query
                ->whereNotNull('dof')
                ->where(
                    'dof',
                    '<=',
                    $flightsRequestDto->dateto->format('Y-m-d')
                );
        }

        if (is_array($flightsRequestDto->regions) and count($flightsRequestDto->regions)) {
            $query
                ->whereIn(
                    'region_id',
                    $flightsRequestDto->regions
                );
        }

        $appends = [];

        if ($flightsRequestDto->regions) {
            $appends['regions'] = $flightsRequestDto->regions;
        }

        if ($flightsRequestDto->datefrom) {
            $appends['datefrom'] = $flightsRequestDto->datefrom->format('Y-m-d');
        }

        if ($flightsRequestDto->dateto) {
            $appends['dateto'] = $flightsRequestDto->dateto->format('Y-m-d');
        }

        return $query
            ->paginate(100)
            ->appends($appends);
    }
}
