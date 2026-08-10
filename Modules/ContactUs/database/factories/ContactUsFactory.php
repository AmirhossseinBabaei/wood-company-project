<?php

namespace Modules\ContactUs\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactUsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\ContactUs\app\Models\ContactMessage::class;

    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'phone' => fake()->numerify('09#########'),
            'email' => fake()->safeEmail(),
            'message' => fake()->paragraph(3),
            'is_read' => fake()->boolean(),
        ];
    }

    public function read(): static
    {
        return $this->state(fn() => [
            'is_read' => true,
        ]);
    }

    public function unread(): static
    {
        return $this->state(fn() => [
            'is_read' => false,
        ]);
    }
}

