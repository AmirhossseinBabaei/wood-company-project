<?php

namespace Modules\Authentication\Http\Controllers;

use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Authentication\Http\Requests\LoginRequest;
use Modules\Authentication\Http\Services\LoginService;
use Modules\Authentication\Transformers\LoginResource;

class LoginController extends Controller
{
    /**
     * login user
     */
    public function login(LoginRequest $request, LoginService $service): JsonResponse
    {
        $status = $service->login($request->validated());

        if (null == $status['token']) {
            return response()->json([
                'message' => __('messages.server_error'),
            ], HttpStatus::UNAUTHORIZED->value);
        }

        return response()->json([
            'message' => __('messages.login_successfully'),
            'data' => LoginResource::make($status)
        ], HttpStatus::CREATED->value);
    }
}
