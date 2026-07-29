<?php

namespace Modules\Authentication\Tests\Feature;

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
    public function test_user_can_login_successfully(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('secret123')
        ]);

        $postedData = [
            'email' => $user->email,
            'password' => 'secret123'
        ];

        $response = $this->post('/api/auth/login', $postedData);

        $this->assertDatabaseHas('personal_access_tokens', [
            'tokenable_id' => $user->id,
            'tokenable_type' => User::class
        ]);

        $response->assertOk();
    }
}
