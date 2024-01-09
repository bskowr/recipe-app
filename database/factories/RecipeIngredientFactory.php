<?php

namespace Database\Factories;

use App\Models\Ingredient;
use App\Models\RecipeStep;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecipeIngredient>
 */
class RecipeIngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_step_id' => RecipeStep::select('id')->orderByRaw('RAND()')->first()->id,
            'ingredient_id' => Ingredient::select('id')->orderByRaw('RAND()')->first()->id,
            'amount_used' => $this->faker->randomFloat(2, 0.00, 250.00),
        ];
    }
}
