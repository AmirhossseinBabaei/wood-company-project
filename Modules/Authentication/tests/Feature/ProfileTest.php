<?php

namespace Modules\Authentication\Tests\Feature;

use App\Enums\HttpStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * profile tests
     */
    public function test_user_can_get_profile(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('api');

        $response = $this->withToken($token->plainTextToken)
            ->get('/api/auth/profile');

        $response->assertOk();

        $response->assertJsonStructure([
            'message',
            'data' => [
                'first_name',
                'last_name',
                'email',
            ],
        ]);
    }

    public function test_user_can_update_profile()
    {
        $user = User::factory()->create();
        $token = $user->createToken('api');

        $updateProfileData = [
            'first_name' => 'AmirHossein009',
            'last_name' => 'Babai009'
        ];

        $response = $this->withToken($token->plainTextToken)
            ->postJson('/api/auth/profile/update', $updateProfileData);

        $response->assertOk();
    }

    public function test_user_can_not_get_profile()
    {
        $response = $this
            ->get('/api/auth/profile');

        $response->assertStatus(HttpStatus::INTERNAL_SERVER_ERROR->value);
    }

    public function test_user_can_not_update_profile()
    {
        $user = User::factory()->create();
        $token = $user->createToken('api');

        $updateProfileData = [
            'first_name' => 'AmirHossein009',
        ];

        $response = $this->withToken($token->plainTextToken)
            ->post('/api/auth/profile/update', $updateProfileData);

        $response->assertStatus(302);
    }
}
