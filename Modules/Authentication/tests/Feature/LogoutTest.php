<?php

namespace Modules\Authentication\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Logout user Test
     */
    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $token = $user->createToken('api');

        $response = $this->withToken($token->plainTextToken)
            ->postJson('/api/auth/logout');

        $response->assertOk();

        $this->assertDatabaseMissing('personal_access_tokens', [
            'id' => $token->accessToken->id,
        ]);
    }
}
