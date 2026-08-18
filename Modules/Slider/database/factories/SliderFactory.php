<?php

namespace Modules\Slider\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Slider\Models\Slider::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

