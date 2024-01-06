<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\RecipeStep;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecipeStep>
 */
class RecipeStepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $recipe_id = Recipe::select('id')->orderByRaw('RAND()')->first()->id;
        return [
            'name' => $this->faker->word(100),
            'description' => rand(0, 10) === 0 ? null : $this->faker->text(512),
            'estimated_time' => $this->faker->time(),
            'step_number' => DB::table('recipe_steps')->where('recipe_id', 'eq', $recipe_id)->count('id') + 1,
            'recipe_id' => $recipe_id,
        ];
    }
}
