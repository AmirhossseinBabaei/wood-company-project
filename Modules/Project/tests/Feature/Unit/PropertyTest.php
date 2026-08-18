<?php

declare(strict_types=1);

namespace Modules\Project\Tests\Features;

use App\Models\User;
use Modules\Project\Models\Property;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    /**
     * @return void
     */
    public function testUserCanSeeAllProperties(): void
    {
        $property = Property::factory()->create(5);
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.properties.index');

        $response->assertOk();
        $response->assertViewHas('properties');
    }

    /**
     * @return void
     */
    public function testUserCanCreateProperty()
    {
        $property = Property::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.properties.create', $property);

        $this->assertDatabaseHas(['fa_title' => $property->fa_name, 'en_name' => $property->en_name]);
        $response->assertRedirect('fa.dashboard.properties.index');
    }

    /**
     * @return void
     */
    public function testUserCanGetProperty()
    {
        $property = Property::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.properties.show', $property);

        $this->assertDatabaseHas(['fa_title' => $property->fa_name, 'en_name' => $property->en_name]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanSeeEditPropertyPage()
    {
        $property = Property::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.properties.edit', $property);

        $this->assertDatabaseHas(['fa_title' => $property->fa_name, 'en_name' => $property->en_name]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanUpdateProperty()
    {
        $property = Property::factory()->toArray();
        $user = User::factory()->create();

        $data = [
            'fa_name' => 'نام تست',
            'en_name' => 'Test Name'
        ];

        $response = $this->actingAs($user)
            ->post('fa.dashboard.properties.update', $property, $data);

        $this->assertDatabaseMissing(['fa_title' => $property->fa_name, 'en_name' => $property->en_name]);
        $this->assertDatabaseHas(['fa_title' => $data['fa_name'], 'fa_url' => $data['en_name']]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanDestroyProperty()
    {
        $property = Property::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.properties.destroy', $property);

        $this->assertDatabaseMissing(['id' => $property->id]);
        $response->assertOk();
    }
}
