<?php

declare(strict_types=1);

namespace Modules\Authentication\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Modules\Authentication\Events\UserRegistered;

class RegisterService
{
    public function register(array $data): bool
    {
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        event(new UserRegistered());

        return true;
    }
}
