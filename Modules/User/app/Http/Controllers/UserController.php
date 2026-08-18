<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Modules\User\Http\Requests\UserRequest;

class UserController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $users = User::latest()
            ->paginate(10);

        return view('user::index', compact('users'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('user::create');
    }

    /**
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return to_route((app()->getLocale() . '.dashboard.users.index'))
            ->with('success', __('messages.education_success'));
    }

    /**
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('user::show', compact('user'));
    }

    /**
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('user::edit', compact('user'));
    }

    /**
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        //Convert pure password to Hashed password
        if ($request->password) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return to_route((app()->getLocale() . '.dashboard.users.index'))
            ->with('success', __('messages.education_success'));
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return to_route((app()->getLocale() . '.dashboard.users.index'))
            ->with('success', __('messages.education_success'));
    }
}
