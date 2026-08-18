<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * @return void
     */
    public function testUserCanSave(): void
    {
        $response = $this->post(route('dashboard.users.store'), [
            'name' => 'Ali',
            'email' => 'ali@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('en.dashboard.users.index'));

        $this->assertDatabaseHas('users', [
            'name' => 'Ali',
            'email' => 'ali@test.com',
        ]);

        $user = User::where('email', 'ali@test.com')->first();
        $this->assertTrue(Hash::check('password', $user->password));
    }

    /**
     * @return void
     */
    public function testUserCanUpdateUser(): void
    {
        $user = User::factory()->create();

        $response = $this->put(route('en.dashboard.users.update', $user), [
            'name' => 'Updated Name',
            'email' => 'updated@test.com',
        ]);

        $response->assertRedirect(route('en.dashboard.users.index'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@test.com',
        ]);
    }

    /**
     * @return void
     */
    public function testUserCanDeleteUser(): void
    {
        $user = User::factory()->create();

        $response = $this->delete(route('en.dashboard.users.destroy', $user));
        $response->assertRedirect(route('en.dashboard.users.index'));

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    /**
     * @return void
     */
    public function testUserCanGetUser(): void
    {
        $user = User::factory()->create();

        $response = $this->get(route('en.dashboard.users.show', $user));
        $response->assertOk();
        $response->assertViewIs('user::show');
        $response->assertViewHas('user');
    }

    /**
     * @return void
     */
    public function testUserCanGetSeeUsers(): void
    {
        User::factory()->count(5)->create();

        $response = $this->get(route('en.dashboard.users.index'));
        $response->assertOk();
        $response->assertViewIs('user::index');
        $response->assertViewHas('users');
    }
}
