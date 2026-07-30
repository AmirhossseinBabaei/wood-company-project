<?php

namespace Modules\Authentication\Tests\Feature;

use App\Enums\HttpStatus;
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

        $response->assertStatus(HttpStatus::CREATED->value);
    }

    public function test_login_user_failed(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('secret123')
        ]);

        $postedData = [
            'email' => $user->email,
            'password' => 'secret'
        ];

        $response = $this->post('/api/auth/login', $postedData);

        $response->assertStatus(HttpStatus::INTERNAL_SERVER_ERROR->value);
    }

    public function test_login_validation_failed()
    {
        $postedData = [
            'email' => 'amir@gmail.com',
            'password' => 'secret'
        ];

        $response = $this->post('/api/auth/login', $postedData);

        $response->assertStatus(HttpStatus::FOUND->value);
    }
}
