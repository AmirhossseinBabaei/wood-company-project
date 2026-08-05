<?php

declare(strict_types=1);

namespace Modules\Auth\Http\Services;

use Illuminate\Support\Facades\Auth;

class LoginService
{
    //login logic
    public function login(array $data): bool
    {
        if (! Auth::attempt($data)) {
            return false;
        }

        request()
            ->session()
            ->regenerate();

        return true;
    }
}
