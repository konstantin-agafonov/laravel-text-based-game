<?php

namespace App\Modules\City\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\City\Http\Resources\CityCollection;
use App\Modules\City\Http\Resources\CityResource;
use App\Modules\City\Models\City;
use App\Modules\City\Services\CityService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Cities controller.
 */
class CityController extends Controller
{
    /**
     * Constructor.
     *
     * @param CityService $service City service
     */
    public function __construct(
        private readonly CityService $service
    )
    {
    }

    /**
     * Returns cities.
     *
     * @return CityCollection
     */
    public function index(): CityCollection
    {
        return CityCollection::make($this->service->getCities());
    }

    /**
     * Returns city resource.
     *
     * @param City $city
     * @return CityResource
     */
    public function show(City $city): CityResource
    {
        return new CityResource($city);
    }

    /**
     * Create a new city.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'name_alt'      => 'nullable|string|max:255',
            'okato'         => 'nullable|string|max:50',
            'oktmo'         => 'nullable|string|max:50',
            'is_dual_name'  => 'boolean',
            'is_capital'    => 'boolean',
            'zip'           => 'nullable|string|max:20',
            'population'    => 'nullable|integer',
            'year_founded'  => 'nullable|integer',
            'name_en'       => 'nullable|string|max:255',
            'lat'           => 'nullable|string|max:20',
            'lon'           => 'nullable|string|max:20',
        ]);

        $city = City::create($data);

        return response()->json($city, Response::HTTP_CREATED);
    }

    /**
     * Update city data.
     */
    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'name'          => 'sometimes|required|string|max:255',
            'name_alt'      => 'nullable|string|max:255',
            'okato'         => 'nullable|string|max:50',
            'oktmo'         => 'nullable|string|max:50',
            'is_dual_name'  => 'boolean',
            'is_capital'    => 'boolean',
            'zip'           => 'nullable|string|max:20',
            'population'    => 'nullable|integer',
            'year_founded'  => 'nullable|integer',
            'name_en'       => 'nullable|string|max:255',
            'lat'           => 'nullable|string|max:20',
            'lon'           => 'nullable|string|max:20',
        ]);

        $city->update($data);

        return response()->json($city, Response::HTTP_OK);
    }

    /**
     * Delete city.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
