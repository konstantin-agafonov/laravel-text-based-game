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
 * 
 * Handles HTTP requests for city-related operations including
 * listing, viewing, creating, updating, and deleting cities.
 */
class CityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param CityService $service The city service instance
     */
    public function __construct(
        private readonly CityService $service
    )
    {
    }

    /**
     * Display a listing of cities.
     *
     * @return CityCollection A collection of city resources
     */
    public function index(): CityCollection
    {
        return CityCollection::make($this->service->getCities());
    }

    /**
     * Display the specified city.
     *
     * @param City $city The city model instance
     * @return CityResource The city resource
     */
    public function show(City $city): CityResource
    {
        return new CityResource($city);
    }

    /**
     * Store a newly created city.
     *
     * @param Request $request The HTTP request containing city data
     * @return \Illuminate\Http\JsonResponse JSON response with created city data
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
     * Update the specified city.
     *
     * @param Request $request The HTTP request containing updated city data
     * @param City $city The city model instance to update
     * @return \Illuminate\Http\JsonResponse JSON response with updated city data
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
     * Remove the specified city.
     *
     * @param City $city The city model instance to delete
     * @return \Illuminate\Http\JsonResponse Empty JSON response with 204 status
     */
    public function destroy(City $city)
    {
        $city->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
