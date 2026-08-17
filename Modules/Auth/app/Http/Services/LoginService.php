<?php

declare(strict_types=1);

namespace Modules\Auth\Http\Services;

use Illuminate\Support\Facades\Auth;

class LoginService
{
    /**
     * @param array $data
     * @return bool
     */
    public function login(array $data): bool
    {
        if (!Auth::attempt($data)) {

            //Login Failed :return false.
            return false;
        }

        request()
            ->session()
            ->regenerate();

        //Login Successfully :return true and regenerate session.
        return true;
    }
}
