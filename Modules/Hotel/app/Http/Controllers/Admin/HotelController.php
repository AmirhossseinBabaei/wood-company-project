<?php

declare(strict_types=1);

namespace Modules\Hotel\Http\Controllers\Admin;

use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Hotel\Http\Requests\HotelRequest;
use Modules\Hotel\Models\Hotel;
use Modules\Hotel\Transformers\HotelResource;
use Modules\Hotel\Http\Services\HotelService;

class HotelController extends Controller
{
    /**
     * list of the hotels with pagination.
     */
    public function index(): JsonResponse
    {
        $hotels = Hotel::with('properties')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return response()->json([
            'data' => HotelResource::collection($hotels),
        ], HttpStatus::OK->value);
    }

    /**
     * create hotel.
     */
    public function create(HotelRequest $request, HotelService $service): JsonResponse
    {
        $data = $request->validated();
        $service->create($data);

        return response()->json([
            'message' => __('message.created', ['resource' => 'Hotel'])
        ], HttpStatus::OK->value);
    }

    /**
     * update hotel.
     */
    public function update(HotelRequest $request, Hotel $hotel, HotelService $service): JsonResponse
    {
        $data = $request->validated();
        $service->update($data, $hotel);

        return response()->json([
            'data' => HotelResource::make($hotel),
            'message' => __('message.updated', ['resource' => 'Hotel'])
        ], HttpStatus::OK->value);
    }

    /**
     * delete hotel.
     */
    public function destroy(Hotel $hotel, HotelService $service): JsonResponse
    {
        $service->destroy($hotel);

        return response()->json([
            'message' => __('message.deleted', ['resource' => 'Hotel'])
        ], HttpStatus::OK->value);
    }

    /**
     * show hotel.
     */
    public function show(Hotel $hotel): JsonResponse
    {
        return response()->json([
            'data' => HotelResource::make($hotel)
        ], HttpStatus::OK->value);
    }
}
