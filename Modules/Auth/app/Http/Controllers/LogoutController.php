<?php

declare(strict_types=1);

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LogoutController extends Controller
{
    /**
     * logout logic
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return to_route('auth.loginForm');
    }
}
