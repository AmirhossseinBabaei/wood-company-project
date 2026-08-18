<?php

declare(strict_types=1);

namespace Modules\Menu\Database\Factories;

use Modules\Menu\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected string $position = Menu::HEADER;

    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Menu\Models\Menu::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }

    /**
     * @return $this
     */
    public function header(): static
    {
        $this->position = Menu::HEADER;

        return $this;
    }

    /**
     * @return $this
     */
    public function footer(): static
    {
        $this->position = Menu::FOOTER;

        return $this;
    }
}
