<?php

namespace Modules\Services\Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Services\Models\Service;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_services(): void
    {
        $user = User::factory()
            ->create();

        $services = Service::factory()->create(10);

        $response = $this
            ->actingAs($user)
            ->get('dashboard/services');

        $response->assertViewHas('services', $services);
        $response->assertOk();
    }

    public function test_user_can_show_service(): void
    {
        $user = User::factory()
            ->create();

        $service = Service::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("dashboard/services/{$service->id}");

        $response->assertViewHas('service', $service);
        $response->assertOk();
    }

    public function test_user_can_create_service(): void
    {
        $user = User::factory()
            ->create();

        $service = Service::factory()->toArray();

        $response = $this
            ->actingAs($user)
            ->post("dashboard/services", $service);

        $this->assertDatabaseHas(['id' => $service->id]);

        $response->assertSessionHas('success');
        $response->assertOk();
    }

    public function test_user_can_update_service(): void
    {
        $user = User::factory()
            ->create();

        $service = Service::factory()->create();
        $service['title'] = "New Title";

        $response = $this
            ->actingAs($user)
            ->put("dashboard/services/{$service->id}", $service);

        $this->assertDatabaseHas(['title' => $service->title]);

        $response->assertSessionHas('success');
        $response->assertOk();
    }

    public function guest_cannot_access_services()
    {
        $response = $this->get('dashboard/services');
        $response->assertStatus(403);
    }

    public function test_title_required()
    {
        $user = User::factory()
            ->create();

        $service = Service::factory()->toArray();
        $service->title = null;

        $response = $this
            ->actingAs($user)
            ->post("dashboard/services", $service);

        $response->assertStatus(403);
    }

    public function test_image_can_be_uploaded()
    {
        Storage::fake('public');
        $user = User::factory()
            ->create();
        $image = UploadedFile::fake()->image('service-image.gif');
        $service = Service::factory()->toArray();

        $service['image'] = $image;

        $response = $this
            ->actingAs($user)
            ->post("dashboard/services", $service);

        $this->assertDatabaseHas(['id' => $service->id]);

        $response->assertSessionHas('success');
        $response->assertOk();

        Storage::disk('public')->exists($service->image);
    }
}
