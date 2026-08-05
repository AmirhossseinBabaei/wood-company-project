<?php

namespace Modules\Auth\Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_user_can_logout(): void
    {
        $data = [
            'email' => 'amir@gmail.com',
            'password' => Hash::make('amirz12')
        ];
        $user = User::factory()->create($data);
        Auth::login($user);

       $this->getJson('auth/logout');
       $this->assertGuest();
    }
}
