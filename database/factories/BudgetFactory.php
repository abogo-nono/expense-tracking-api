<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = $this->faker->date();
        return [
            'amount' => $this->faker->randomFloat(2, 10, 100),
            'start_date' => $date,
            'end_date' => $date + '1months',
            'category_id' => Category::factory(),
        ];
    }
}
