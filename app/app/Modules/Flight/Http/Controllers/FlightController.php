<?php

namespace App\Modules\Flight\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Flight\Dto\FlightsRequestTransformer;
use App\Modules\Flight\Http\Requests\FlightsRequest;
use App\Modules\Flight\Http\Resources\FlightCollection;
use App\Modules\Flight\Http\Resources\FlightResource;
use App\Modules\Flight\Models\Flight;
use App\Modules\Flight\Services\FlightService;
use App\Modules\Region\Models\Region;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Контроллер городов.
 */
class FlightController extends Controller
{
    /**
     * Конструктор.
     *
     * @param FlightService $service Сервис стран
     */
    public function __construct(
        private readonly FlightService $service,
        private readonly FlightsRequestTransformer $flightsRequestTransformer
    )
    {
    }

    /**
     * Возвращает полёты.
     *
     * @param FlightsRequest $flightsRequest
     * @return FlightCollection
     * @throws Exception
     */
    public function index(FlightsRequest $flightsRequest): FlightCollection
    {
        try {
            $dto = $this->flightsRequestTransformer->transform($flightsRequest);
            $flights = $this->service->getFlights($dto);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        return FlightCollection::make($flights);
    }

    public function show(Flight $flight): FlightResource
    {
        return new FlightResource($flight);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sid'       => 'sometimes|nullable|string|max:255',
            'reg'       => 'sometimes|nullable|string|max:255',
            'dep'       => 'sometimes|nullable|string|max:255',
            'dest'      => 'sometimes|nullable|string|max:255',
            'eet'       => 'sometimes|nullable|string|max:255',
            'zona'      => 'sometimes|nullable|string|max:1024',
            'typ'       => 'sometimes|nullable|string|max:255',
            'folder'    => 'sometimes|nullable|string|max:255',
            'dof'       => 'sometimes|nullable|date|date_format:Y-m-d',
            'dep_time'  => 'sometimes|nullable|string|size:8',
            'arr_time'  => 'sometimes|nullable|string|size:8',
            'region_id' => 'required|integer|gt:0|exists:' . Region::getTableName() . ',id',
        ]);

        $flight = Flight::create($data);

        return response()->json($flight, Response::HTTP_CREATED);
    }

    public function update(Request $request, Flight $flight)
    {
        $data = $request->validate([
            'sid'       => 'sometimes|nullable|string|max:255',
            'reg'       => 'sometimes|nullable|string|max:255',
            'dep'       => 'sometimes|nullable|string|max:255',
            'dest'      => 'sometimes|nullable|string|max:255',
            'eet'       => 'sometimes|nullable|string|max:255',
            'zona'      => 'sometimes|nullable|string|max:1024',
            'typ'       => 'sometimes|nullable|string|max:255',
            'folder'    => 'sometimes|nullable|string|max:255',
            'dof'       => 'sometimes|nullable|date|date_format:Y-m-d',
            'dep_time'  => 'sometimes|nullable|string|size:8',
            'arr_time'  => 'sometimes|nullable|string|size:8',
            'region_id' => 'required|integer|gt:0|exists:' . Region::getTableName() . ',id',
        ]);

        $flight->update($data);

        return response()->json($flight, Response::HTTP_OK);
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
