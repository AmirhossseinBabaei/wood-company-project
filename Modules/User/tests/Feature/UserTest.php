<?php

namespace Modules\User\Tests\Feature;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_can_save_user(): void
    {
        $response = $this->post(route('dashboard.users.store'), [
            'name' => 'Ali',
            'email' => 'ali@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('dashboard.users.index'));

        $this->assertDatabaseHas('users', [
            'name' => 'Ali',
            'email' => 'ali@test.com',
        ]);

        $user = User::where('email', 'ali@test.com')->first();
        $this->assertTrue(Hash::check('password', $user->password));
    }

    public function test_can_update_user(): void
    {
        $user = User::factory()->create();

        $response = $this->put(route('dashboard.users.update', $user), [
            'name' => 'Updated Name',
            'email' => 'updated@test.com',
        ]);

        $response->assertRedirect(route('dashboard.users.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@test.com',
        ]);
    }

    public function test_can_delete_user(): void
    {
        $user = User::factory()->create();

        $response = $this->delete(route('dashboard.users.destroy', $user));
        $response->assertRedirect(route('dashboard.users.index'));

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    public function test_can_get_user(): void
    {
        $user = User::factory()->create();

        $response = $this->get(route('dashboard.users.show', $user));
        $response->assertOk();
        $response->assertViewIs('user::show');
        $response->assertViewHas('user');
    }

    public function test_can_get_list_users(): void
    {
        User::factory()->count(5)->create();

        $response = $this->get(route('dashboard.users.index'));
        $response->assertOk();
        $response->assertViewIs('user::index');
        $response->assertViewHas('users');
    }
}
