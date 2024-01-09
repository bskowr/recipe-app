<?php

namespace Database\Factories;

use App\Models\RecipeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(100),
            'description' => rand(0, 10) === 0 ? null : $this->faker->text(512),
            'estimated_time' => $this->faker->time(),
            'portions' => $this->faker->randomNumber(),
            'recipe_category_id' => RecipeCategory::select('id')->orderByRaw('RAND()')->first()->id,
            'created_at' => $this->faker->dateTimeBetween('- 8 weeks', '- 2 weeks'),
            'updated_at' => $this->faker->dateTimeBetween('- 2 weeks', '- 1 weeks'),
            'deleted_at' => rand(0, 10) === 0 ? $this->faker->dateTimeBetween('- 1 week', '+ 2 weeks') : null            
        ];
    }
}
