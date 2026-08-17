<?php

declare(strict_types=1);

namespace Modules\Auth\Tests\Unit;

use App\Models\User;
use Modules\ContactUs\app\Models\ContactMessage;
use Modules\Project\Models\Project;
use Modules\Services\Models\Service;
use Modules\Slider\Models\Slider;
use Tests\TestCase;

class DashboardTest extends TestCase
{

    public function test_admin_can_see_dashboard(): void
    {
        $user = User::factory()->create();

        //Login User.
        $response = $this->actingAs($user)
            ->get((app()->getLocale() . ".dashboard"));

        //Check response view data.
        $response->assertViewHas('counters', [
            'users' => User::count(),
            'projects' => Project::count(),
            'contact_messages_count' => ContactMessage::count(),
            'services' => Service::count(),
        ]);

        $response->assertViewHas('latest_projects', Project::latest()
            ->take(3)->get());
        $response->assertViewHas('latest_services', Service::latest()
            ->take(3)->get());
        $response->assertViewHas('latest_sliders', Slider::latest()
            ->take(3)->get());

        $response->assertOk();
    }
}
