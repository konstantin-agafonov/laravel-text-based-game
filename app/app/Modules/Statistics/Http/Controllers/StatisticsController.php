<?php

namespace App\Modules\Statistics\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Region\Models\Region;
use App\Modules\Statistics\Services\StatisticsService;

/**
 * Контроллер статистики.
 */
class StatisticsController extends Controller
{
    /**
     * Конструктор.
     *
     * @param StatisticsService $service Сервис стран
     */
    public function __construct(
        private readonly StatisticsService $service
    )
    {
    }

    /**
     * Возвращает статистику по региону.
     *
     * @param Region $region
     * @return array
     */
    public function getRegionStatistics(Region $region): array
    {
        return $this->service->getRegionStatistics($region);
    }
}
