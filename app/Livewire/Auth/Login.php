<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{

    public string $email;
    public string $password;

    protected $rules = [
        'email' => 'required|email|exists|users,email',
        'password' => 'required'
    ];

    public function mount()
    {
        if (Auth::user()) {
            return redirect()->route(app()->getLocale().".dashboard.index");
        }
    }

    public function updatedEmail()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email'
        ]);
    }

    public function updatedPassword()
    {
        $this->validate([
            'password' => 'required'
        ]);
    }

    public function loginUser()
    {
        $user = User::where('email', $this->email)->first();

        if ($user && Hash::check($this->password, $user->password)) {
            Auth::login($user);

            return redirect()->route(app()->getLocale().".dashboard.index");
        }

        return Session::flash('error', 'ایمیل یا پسورد اشتباه است');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
