<?php

namespace App\Modules\City\Tests\Unit\Models;

use App\Modules\City\Models\City;
use App\Modules\Offer\Models\Offer;
use App\Modules\Tour\Models\Tour;
use Tests\AbstractUnitTestCase;
use Tests\Unit\AssertModelTrait;

/**
 * Тест модели города.
 *
 * @see City
 */
class CityTest extends AbstractUnitTestCase
{
    use AssertModelTrait;

    /**
     * Имя модели.
     *
     * @var string
     */
    private string $model = City::class;

    /**
     * Тест имени таблицы.
     *
     * @covers \App\Modules\City\Models\City::getTable()
     * @return void
     */
    public function testGetTable(): void
    {
        $this->assertTableName(
            $this->model,
            'cities'
        );
    }

    /**
     * Тест связи с турами.
     *
     * @covers \App\Modules\City\Models\City::tours
     */
    public function testTours(): void
    {
        $this->assertHasMany(
            $this->model,
            'tours',
            Tour::class,
            'city_id',
            'id'
        );
    }

    /**
     * Тест связи с предложениями
     *
     * @covers \App\Modules\City\Models\City::offers
     * @return void
     */
    public function testOffers(): void
    {
        $this->assertBelongsToMany(
            $this->model,
            'offers',
            Offer::class,
            'city_offer',
            'city_id',
            'offer_id'
        );
    }
}
