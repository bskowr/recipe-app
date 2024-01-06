<?php

namespace Database\Factories;

use App\Models\IngredientCategory;
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
        $unit_array = ['kg', 'g', 'l', 'ml'];
        return [
            'name' => $this->faker->word(100),
            'description' => rand(0, 10) === 0 ? null : $this->faker->text(512),
            'ingredient_category_id' => IngredientCategory::select('id')->orderByRaw('RAND()')->first()->id,
            'price' => $this->faker->randomFloat(2, 0.01, 500.00),
            'owned_amount' => $this->faker->randomFloat(2, 0.00, 250.00),
            'unit' => rand(0, 10) === 0 ? null : $unit_array[array_rand($unit_array)],
            'created_at' => $this->faker->dateTimeBetween('- 8 weeks', '- 2 weeks'),
            'updated_at' => $this->faker->dateTimeBetween('- 2 weeks', '- 1 weeks'),
            'deleted_at' => rand(0, 10) === 0 ? $this->faker->dateTimeBetween('- 1 week', '+ 2 weeks') : null            
        ];
    }
}
