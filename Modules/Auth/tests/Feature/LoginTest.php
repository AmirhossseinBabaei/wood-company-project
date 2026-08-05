<?php

namespace Modules\Auth\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_user_can_login(): void
    {
        $user = User::factory()->create([
            'email' => 'amir@gmail.com',
            'password' => Hash::make('amirz12')
        ]);

        $this->postJson('auth/login', ['email' => $user->email, 'password' => 'amirz12']);
        $this->assertAuthenticated();
    }
}
