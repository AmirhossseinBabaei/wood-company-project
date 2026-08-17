<?php

namespace Modules\Settings\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Settings\app\Http\Models\Setting::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'fa_website_name' => fake()->name,
            'en_website_name' => fake()->company(),

            'fa_website_description' => fake('fa_IR')->sentence(),
            'en_website_description' => fake()->sentence(),

            'logo_src' => 'settings/logo.png',
            'favicon' => 'settings/favicon.ico',
            'footer_logo' => 'settings/footer-logo.png',

            'email' => fake()->safeEmail(),

            'phone' => fake()->numerify('051########'),
            'mobile' => fake()->numerify('09#########'),

            'fa_address' => fake('fa_IR')->address(),
            'en_address' => fake()->address(),

            'instagram' => fake()->url(),
            'telegram' => fake()->url(),
            'linkedin' => fake()->url(),
            'whatsapp' => fake()->url(),
        ];
    }
}

