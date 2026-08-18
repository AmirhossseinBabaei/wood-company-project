<?php

declare(strict_types=1);

namespace Modules\Home\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Menu\Models\Menu;
use Modules\Project\Models\Project;
use Modules\Settings\app\Models\Setting;
use Modules\Slider\Models\Slider;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testUserCanSeeUserHomePage(): void
    {
        Menu::factory()->header()->create(10);
        Menu::factory()->footer()->create(10);

        Slider::factory()->create(3);

        Setting::factory()->create();

        Project::factory()->create();

        $response = $this->get('/')->assertViewHas([
            'headerMenus',
            'footerMenus',
            'sliders',
            'setting',
            'counters' => ['servicesCount', 'projectsCount', 'usersCount'],
            'projects'
        ]);

        $response->assertOk();
    }
}
