<?php

namespace App\Modules\City\Tests\Unit\Models;

use App\Modules\City\Models\City;
use App\Modules\Offer\Models\Offer;
use App\Modules\Tour\Models\Tour;
use Tests\AbstractUnitTestCase;
use Tests\Unit\AssertModelTrait;

/**
 * City model test.
 *
 * @see City
 */
class CityTest extends AbstractUnitTestCase
{
    use AssertModelTrait;

    /**
     * Model name.
     *
     * @var string
     */
    private string $model = City::class;

    /**
     * Table name test.
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
     * Tours relationship test.
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
     * Offers relationship test
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
