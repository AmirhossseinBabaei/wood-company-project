<?php

namespace Modules\ContactUs\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\ContactUs\Models\TeamMember;

class TeamMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\ContactUs\Models\TeamMember::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
         return [
            'full_name' => fake()->name(),
            'status' => fake()->randomElement([
                TeamMember::ACTIVE,
                TeamMember::INACTIVE
            ]),
            'filed' => fake()->jobTitle(),
            'image' => fake()->filePath()
        ];
    }
}

