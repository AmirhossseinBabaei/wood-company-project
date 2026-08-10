<?php

namespace Modules\Gallery\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Gallery\app\Models\Gallery;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition(): array
    {
        return [

            'fa_title' => fake()->sentence(),
            'en_title' => fake()->sentence(),
            'fa_description' => fake()->paragraph(),
            'en_description' => fake()->paragraph(),
            'sort_order' => fake()->numberBetween(1, 100),
            'image' => 'gallery/test.jpg',
            'status' => true,
        ];
    }
}

