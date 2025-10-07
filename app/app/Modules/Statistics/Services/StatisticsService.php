<?php declare(strict_types=1);

namespace App\Modules\Statistics\Services;

use App\Modules\Flight\Models\Flight;
use App\Modules\Region\Models\Region;

/**
 * Сервис статистики.
 */
class StatisticsService
{

    /**
     * Возвращает статистики.
     *
     * @param Region $region
     * @return array
     */
    public function getRegionStatistics(Region $region): array
    {
        // Получаем все полёты для региона
        $flights = Flight::regionScope($region)->valid();

        // Общая статистика по региону
        $totalFlights = $flights->count();

        // Статистика по годам
        $yearlyStats = $flights
            ->selectRaw(<<<EOD
                EXTRACT(YEAR FROM dof) as year,
                COUNT(*) as flight_count,
                AVG(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as timediff,
                MAX(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as maxtime,
                MIN(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as mintime
            EOD)
            ->whereNotNull('dof')
            ->groupBy('year')
            ->orderBy('year')
            ->get()
            ->keyBy('year')
        ;

        // Статистика по годам и месяцам (детализированная)
        $yearlyMonthlyStats = $flights
            ->selectRaw(<<<EOD
                EXTRACT(YEAR FROM dof) as year,
                EXTRACT(MONTH FROM dof) as month,
                COUNT(*) as flight_count,
                AVG(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as timediff,
                MAX(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as maxtime,
                MIN(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as mintime
            EOD)
            ->whereNotNull('dof')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->groupBy('year')
            ->map(function ($yearData) {
                return $yearData->keyBy('month');
            })
        ;

        // Статистика по годам и неделям (детализированная)
        $yearlyWeeklyStats = $flights
            ->selectRaw(<<<EOD
                EXTRACT(YEAR FROM dof) as year,
                EXTRACT(WEEK FROM dof) as week_number,
                COUNT(*) as flight_count,
                AVG(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as timediff,
                MAX(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as maxtime,
                MIN(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as mintime
            EOD)
            ->whereNotNull('dof')
            ->groupBy('year', 'week_number')
            ->orderBy('year')
            ->orderBy('week_number')
            ->get()
            ->groupBy('year')
            ->map(function ($yearData) {
                return $yearData->keyBy('week_number');
            })
        ;

        // Статистика по годам и кварталам (детализированная)
        $yearlyQuarterlyStats = $flights
            ->selectRaw(<<<EOD
                EXTRACT(YEAR FROM dof) as year,
                EXTRACT(QUARTER FROM dof) as quarter,
                COUNT(*) as flight_count,
                AVG(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as timediff,
                MAX(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as maxtime,
                MIN(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as mintime
            EOD)
            ->whereNotNull('dof')
            ->groupBy('year', 'quarter')
            ->orderBy('year')
            ->orderBy('quarter')
            ->get()
            ->groupBy('year')
            ->map(function ($yearData) {
                return $yearData->keyBy('quarter');
            })
        ;

        // Статистика по годам и сезонам (детализированная)
        $yearlySeasonalStats = $flights
            ->selectRaw(<<<EOD
                EXTRACT(YEAR FROM dof) as year,
                CASE
                    WHEN EXTRACT(MONTH FROM dof) IN (12, 1, 2) THEN 'Winter'
                    WHEN EXTRACT(MONTH FROM dof) IN (3, 4, 5) THEN 'Spring'
                    WHEN EXTRACT(MONTH FROM dof) IN (6, 7, 8) THEN 'Summer'
                    WHEN EXTRACT(MONTH FROM dof) IN (9, 10, 11) THEN 'Fall'
                END as season,
                COUNT(*) as flight_count,
                AVG(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as timediff,
                MAX(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as maxtime,
                MIN(CASE WHEN arr_time > dep_time THEN arr_time - dep_time ELSE (arr_time - CAST('00:00' as time)) + (CAST('24:00' as time) - dep_time) END) as mintime
            EOD)
            ->whereNotNull('dof')
            ->groupBy('year', 'season')
            ->orderBy('year')
            ->orderBy('season')
            ->get()
            ->groupBy('year')
            ->map(function ($yearData) {
                return $yearData->keyBy('season');
            })
        ;

        return [
            'region' => [
                'id' => $region->id,
                'name' => $region->name,
                'name_alt' => $region->name_alt ?? null,
            ],
            'summary' => [
                'total_flights' => $totalFlights,
                'years_covered' => $yearlyStats->count(),
            ],
            'statistics' => [
                'by_year' => $yearlyStats->map(function ($item) {
                    return [
                        'year' => $item->year,
                        'flight_count' => $item->flight_count,
                        'avg_flight_time' => $item->timediff,
                        'min_flight_time' => $item->mintime,
                        'max_flight_time' => $item->maxtime,
                    ];
                })->values(),

                'by_year_and_month' => $yearlyMonthlyStats->map(function ($yearData, $year) {
                    return [
                        'year' => $year,
                        'months' => $yearData->map(function ($item) {
                            return [
                                'month' => $item->month,
                                'flight_count' => $item->flight_count,
                                'avg_flight_time' => $item->timediff,
                                'min_flight_time' => $item->mintime,
                                'max_flight_time' => $item->maxtime,
                            ];
                        })->values(),
                    ];
                })->values(),

                'by_year_and_week' => $yearlyWeeklyStats->map(function ($yearData, $year) {
                    return [
                        'year' => $year,
                        'weeks' => $yearData->map(function ($item) {
                            return [
                                'week_number' => $item->week_number,
                                'flight_count' => $item->flight_count,
                                'avg_flight_time' => $item->timediff,
                                'min_flight_time' => $item->mintime,
                                'max_flight_time' => $item->maxtime,
                            ];
                        })->values(),
                    ];
                })->values(),

                'by_year_and_quarter' => $yearlyQuarterlyStats->map(function ($yearData, $year) {
                    return [
                        'year' => $year,
                        'quarters' => $yearData->map(function ($item) {
                            return [
                                'quarter' => $item->quarter,
                                'flight_count' => $item->flight_count,
                                'avg_flight_time' => $item->timediff,
                                'min_flight_time' => $item->mintime,
                                'max_flight_time' => $item->maxtime,
                            ];
                        })->values(),
                    ];
                })->values(),

                'by_year_and_season' => $yearlySeasonalStats->map(function ($yearData, $year) {
                    return [
                        'year' => $year,
                        'seasons' => $yearData->map(function ($item) {
                            return [
                                'season' => $item->season,
                                'flight_count' => $item->flight_count,
                                'avg_flight_time' => $item->timediff,
                                'min_flight_time' => $item->mintime,
                                'max_flight_time' => $item->maxtime,
                            ];
                        })->values(),
                    ];
                })->values(),
            ],
        ];
    }
}
