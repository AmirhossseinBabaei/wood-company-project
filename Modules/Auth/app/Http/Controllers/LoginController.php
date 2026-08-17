<?php

declare(strict_types=1);

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Auth\Http\Requests\LoginRequest;
use Modules\Auth\Http\Services\LoginService;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function showForm(): View
    {
        return view('auth::login');
    }

    /**
     * @param LoginRequest $request
     * @param LoginService $loginService
     * @return RedirectResponse
     */
    public function login(LoginRequest $request, LoginService $loginService): RedirectResponse
    {
        $data = $request->validated();

        $loginStatus = $loginService->login($data);

        //Check login failed
        if (false == $loginStatus) {

            return to_route('auth.login')->with('error', __('Auth::words.login_failed'));
        }

        //Redirecting with successfully login to dashboard with current lang.
        return to_route((app()->getLocale() . '.dashboard'));
    }
}
