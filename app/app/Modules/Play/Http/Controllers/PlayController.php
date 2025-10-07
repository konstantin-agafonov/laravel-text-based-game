<?php

namespace App\Modules\Play\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Play\Services\PlayService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlayController extends Controller
{
    /**
     * Конструктор.
     *
     * @param PlayService $service Сервис игры
     */
    public function __construct(
        private readonly PlayService $service
    )
    {
    }

    public function play(Request $request): JsonResponse
    {
        $data = $request->validate([
            'move' => 'required|string|max:255',
        ]);

        $response = $this->service->play($data);

        return response()->json($response, Response::HTTP_CREATED);
    }
}
