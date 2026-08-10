<?php

declare(strict_types=1);

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Services\LoginService;

class LoginController extends Controller
{
    /**
     * show login form
     */
    public function showForm()
    {
        return view('auth::login');
    }

    /**
     * login logic
     */
    public function login(LoginRequest $request, LoginService $loginService)
    {
        $data = $request->validated();
        $loginStatus = $loginService->login($data);

        if(false == $loginStatus) {
            return view('auth::login')->with('error', __('Auth::messages.login_failed'));
        }

        return to_route('dashboard');
    }
}
