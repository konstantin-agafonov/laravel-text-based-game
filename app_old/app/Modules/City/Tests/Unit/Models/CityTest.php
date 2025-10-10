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
 * Tests the City model functionality including table name and relationships.
 *
 * @see City
 */
class CityTest extends AbstractUnitTestCase
{
    use AssertModelTrait;

    /**
     * The model class name to test.
     *
     * @var string
     */
    private string $model = City::class;

    /**
     * Test the table name method.
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
     * Test the tours relationship.
     *
     * @covers \App\Modules\City\Models\City::tours
     * @return void
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
     * Test the offers relationship.
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
