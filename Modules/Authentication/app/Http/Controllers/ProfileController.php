<?php

namespace Modules\Authentication\Http\Controllers;

use App\Enums\HttpStatus;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Authentication\Http\Requests\ProfileUpdateRequest;
use Modules\Authentication\Transformers\UserProfileResource;

class ProfileController extends Controller
{
    /**
     * show profile
     */
    public function getProfile(Request $request): JsonResponse
    {
        $user = $request->user();

        if (null == $user) {
            return response()->json([
                'message' => __('messages.server_error'),
            ], HttpStatus::INTERNAL_SERVER_ERROR->value);
        }

        return response()->json([
            'message' => __('messages.updated', ['resource' => 'User Profile']),
            'data' => UserProfileResource::make($user)
        ], HttpStatus::OK->value);
    }

    /**
    * update profile
     **/
    public function updateProfile(ProfileUpdateRequest $request): JsonResponse
    {
        $user = $request->user();
        $data = $request->validated();

        if (null == $user) {
            return response()->json([
                'message' => __('messages.server_error'),
            ], HttpStatus::INTERNAL_SERVER_ERROR->value);
        }

        $request
            ->user()
            ->update($data);

        return response()->json([
            'message' => __('messages.updated', ['resource' => 'User Profile']),
            'data' => UserProfileResource::make($user)
        ], HttpStatus::OK->value);
    }
}
