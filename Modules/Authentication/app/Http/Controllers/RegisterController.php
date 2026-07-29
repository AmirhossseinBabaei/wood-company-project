<?php

declare(strict_types=1);

namespace Modules\Authentication\Http\Controllers;

use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Authentication\Http\Requests\RegisterRequest;
use Modules\Authentication\Http\Services\RegisterService;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request, RegisterService $service): JsonResponse
    {
        $status = $service->register($request->validated());

        if (false == $status) {
            return response()->json([
                'message' => __('messages.server_error'),
            ], HttpStatus::INTERNAL_SERVER_ERROR->value);
        }

        return response()->json([
            'message' => __('messages.created', ['resource' => 'User'])
        ], HttpStatus::OK->value);
    }
}
