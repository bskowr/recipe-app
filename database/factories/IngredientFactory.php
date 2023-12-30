<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
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
            'description' => rand(0, 10) === 0 ? $this->faker->text(512) : null,
            'ingredient_category_id' => IngredientFactory::select('id')->orderByRaw('RAND()')->first()->id,
            'price' => $this->faker->randomFloat(2, 0.01, 500.00),
            'owned_amount' => $this->faker->randomFloat(2, 0.00, 250.00),
            'unit' => rand(0, 10) === 0 ?array_rand(['kg', 'g', 'l', 'ml']) : null,
            'created_at' => $this->faker->dateTimeBetween('- 8 weeks', '- 2 weeks'),
            'updated_at' => $this->faker->dateTimeBetween('- 2 weeks', '- 1 weeks'),
            'deleted_at' => rand(0, 10) === 0 ? $this->faker->dateTimeBetween('- 1 week', '+ 2 weeks') : null            
        ];
    }
}
