<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $icons = ['fas fa-a', 'fas fa-b', 'fas fa-c', 'fas fa-d', 'fas fa-e', 'fas fa-f', 'fas fa-g', 'fas fa-h', 'fas fa-i', 'fas fa-j'];

        return [
            'name' => $this->faker->text(25),
            'icon' => $this->faker->unique()->randomElement($icons),
            'color' => $this->faker->colorName
        ];
    }
}
