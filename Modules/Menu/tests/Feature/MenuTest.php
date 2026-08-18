<?php

declare(strict_types=1);

namespace Modules\Menu\Tests\Features;

use App\Models\User;
use Modules\Menu\Models\Menu;
use Tests\TestCase;

class MenuTest extends TestCase
{
    /**
     * @return void
     */
    public function testUserCanSeeAllMenus(): void
    {
        $menu = Menu::factory()->create(5);
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.menus.index');

        $response->assertOk();
        $response->assertViewHas('menus');
    }

    /**
     * @return void
     */
    public function testUserCanCreateMenu()
    {
        $menu = Menu::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.menus.create', $menu);

        $this->assertDatabaseHas(['fa_title' => $menu->fa_title, 'fa_url' => $menu->fa_url]);
        $response->assertRedirect('fa.dashboard.menus.index');
    }

    /**
     * @return void
     */
    public function testUserCanGetMenu()
    {
        $menu = Menu::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.menus.show', $menu);

        $this->assertDatabaseHas(['fa_title' => $menu->fa_title, 'fa_url' => $menu->fa_url]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanSeeEditMenuPage()
    {
        $menu = Menu::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.menus.edit', $menu);

        $this->assertDatabaseHas(['fa_title' => $menu->fa_title, 'fa_url' => $menu->fa_url]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanUpdateMenu()
    {
        $menu = Menu::factory()->toArray();
        $user = User::factory()->create();

        $data = [
            'fa_name' => 'Main Test',
            'fa_url' => 'https://www.google.com/articles'
        ];

        $response = $this->actingAs($user)
            ->post('fa.dashboard.menus.update', $menu, $data);

        $this->assertDatabaseMissing(['fa_title' => $menu->fa_title, 'fa_url' => $menu->fa_url]);
        $this->assertDatabaseHas(['fa_title' => $data['fa_title'], 'fa_url' => $data['fa_url']]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanDestroyMenu()
    {
        $menu = Menu::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.menus.destroy', $menu);

        $this->assertDatabaseMissing(['id' => $menu->id]);
        $response->assertOk();
    }
}
