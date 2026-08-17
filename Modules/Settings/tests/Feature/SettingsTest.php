<?php

declare(strict_types=1);

namespace Modules\Settings\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Settings\app\Http\Models\Setting;
use Tests\TestCase;

class SettingsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testUserCanSeeSettings(): void
    {
        $user = User::factory()
            ->create();

        $setting = Setting::factory()
            ->create();

        $response = $this->actingAs($user)
            ->get('dashboard/settings');

        $response->assertViewHas('setting', $setting);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanUpdateSettings(): void
    {
        $fakeSetting = Setting::factory()->toArray();
        $response = $this->post('dashboard/settings/update', $fakeSetting);
        $this->assertDatabaseHas(['fa_title'  => $fakeSetting->fa_title]);

        $response->assertSessionHas('success', __('Settings::words.success_update'));
    }
}
