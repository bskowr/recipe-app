<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecipeCategory>
 */
class RecipeCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(100),
            'created_at' => $this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 2 weeks'
            ),
            'updated_at' => $this->faker->dateTimeBetween(
                '- 2 weeks',
                '- 1 weeks'
            ),
            'deleted_at' => rand(0, 10) === 0
                ? $this->faker->dateTimeBetween(
                    '- 1 week',
                    '+ 2 weeks'
                ) : null            
        ];
    }
}
