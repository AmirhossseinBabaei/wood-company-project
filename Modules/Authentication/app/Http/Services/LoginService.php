<?php

namespace Modules\Authentication\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function login(array $data): array
    {
        $user = User::query()
            ->where('email', $data['email'])
            ->first();

        if (Hash::check($data['password'], $user->password)) {
            $token = $user->createToken('api');

            $token->accessToken->forceFill([
                'expires_at' => now()->addDay(),
            ])->save();

            return ['user' => $user, 'token' => $token->plainTextToken];
        }

        return [];
    }
}
