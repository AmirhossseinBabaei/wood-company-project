<?php

namespace Modules\Authentication\Http\Controllers;

use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * logout user
     */
    public function logout(Request $request): JsonResponse
    {
        $request
            ->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([
            'message' => __('messages.logout'),
        ], HttpStatus::OK->value);
    }
}
