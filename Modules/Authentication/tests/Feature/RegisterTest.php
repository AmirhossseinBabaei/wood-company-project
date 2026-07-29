<?php

declare(strict_types=1);

namespace Modules\Authentication\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_user_can_register(): void
    {
        $user = User::factory()->make()->toArray();

        $response = $this->post('/api/auth/register', $user);

        $this->assertDatabaseHas('users', [
            'email' => $user['email']
        ]);

        $response->assertOk();
    }

    public function test_user_can_not_pass_validation_register(): void
    {
        $user = ['email' => 'ali', 'password' => 'laravel12345'];

        $response = $this->post('/api/auth/register', $user);
        $response->assertStatus(302);
    }
}
