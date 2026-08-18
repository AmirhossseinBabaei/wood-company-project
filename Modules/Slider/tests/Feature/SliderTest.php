<?php

declare(strict_types=1);

namespace Modules\Slider\Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Slider\Models\Slider;
use Tests\TestCase;

class SliderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function testUserCanSeeAllSliders(): void
    {
        $sliders = Slider::factory()->create(5);
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.sliders.index');

        $response->assertOk();
        $response->assertViewHas('sliders');
    }

    /**
     * @return void
     */
    public function testUserCanCreateSlider()
    {
        $slider = Slider::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.sliders.create', $slider);

        $this->assertDatabaseHas(['fa_title' => $slider->fa_title, 'image' => $slider->image, 'en_slug' => $slider->en_slug]);
        $response->assertRedirect('fa.dashboard.sliders.index');
    }

    /**
     * @return void
     */
    public function testUserCanGetSlider()
    {
        $slider = Slider::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('fa.dashboard.sliders.show', $slider);

        $this->assertDatabaseHas(['fa_title' => $slider->fa_title, 'image' => $slider->image, 'en_slug' => $slider->en_slug]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanSeeEditSliderPage()
    {
        $slider = Slider::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('fa.dashboard.sliders.edit', $slider);

        $this->assertDatabaseHas(['fa_title' => $slider->fa_title, 'image' => $slider->image, 'en_slug' => $slider->en_slug]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanUpdateSlider()
    {
        $slider = Slider::factory()->toArray();
        $user = User::factory()->create();

        $data = [
            'fa_title' => 'اسلایدر مخصوص یک',
            'image' => 'sliders/pipeline.png',
            'en_slug' => 'Lorem ipusm dollar is slider one'
        ];

        $response = $this->actingAs($user)
            ->post('fa.dashboard.sliders.update', $slider, $data);

        $this->assertDatabaseHas(['fa_title' => $data['fa_title'], 'image' => $data['image'], 'en_slug' => $data['en_slug']]);
        $this->assertDatabaseMissing(['fa_title' => $slider->fa_title, 'image' => $slider->image, 'en_slug' => $slider->en_slug]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanDestroySlider()
    {
        $slider = Slider::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.sliders.destroy', $slider);

        $this->assertDatabaseMissing(['id' => $slider->id]);
        $response->assertOk();
    }
}
