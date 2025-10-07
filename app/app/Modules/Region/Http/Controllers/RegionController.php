<?php

namespace App\Modules\Region\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Region\Http\Resources\RegionCollection;
use App\Modules\Region\Http\Resources\RegionResource;
use App\Modules\Region\Models\Region;
use App\Modules\Region\Services\RegionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Контроллер регионов.
 */
class RegionController extends Controller
{
    /**
     * Конструктор.
     *
     * @param RegionService $service Сервис регионов
     */
    public function __construct(
        private readonly RegionService $service
    )
    {
    }

    public function index(): RegionCollection
    {
        return RegionCollection::make($this->service->getRegions());
    }

    public function show(Region $region): RegionResource
    {
        return new RegionResource($region);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'         => 'required|string|max:255',
            'type'         => 'nullable|string|max:50',
            'type_short'   => 'nullable|string|max:50',
            'okato'        => 'nullable|string|max:50',
            'oktmo'        => 'nullable|string|max:50',
            'code'         => 'nullable|string|max:50',
            'iso_3166-2'   => 'nullable|string|max:50',
            'population'   => 'nullable|string|max:50',
            'year_founded' => 'nullable|string|max:50',
            'fullname'     => 'nullable|string|max:50',
            'name_en'      => 'nullable|string|max:50',
            'district'     => 'nullable|string|max:50',
        ]);

        $region = Region::create($data);

        return response()->json($region, Response::HTTP_CREATED);
    }

    public function update(Request $request, Region $region)
    {
        $data = $request->validate([
            'name'         => 'sometimes|required|string|max:255',
            'type'         => 'nullable|string|max:50',
            'type_short'   => 'nullable|string|max:50',
            'okato'        => 'nullable|string|max:50',
            'oktmo'        => 'nullable|string|max:50',
            'code'         => 'nullable|string|max:50',
            'iso_3166-2'   => 'nullable|string|max:50',
            'population'   => 'nullable|string|max:50',
            'year_founded' => 'nullable|string|max:50',
            'fullname'     => 'nullable|string|max:50',
            'name_en'      => 'nullable|string|max:50',
            'district'     => 'nullable|string|max:50',
        ]);

        $region->update($data);

        return response()->json($region, Response::HTTP_OK);
    }

    public function destroy(Region $region)
    {
        $region->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
