<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\RecipeStep;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipeStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = Ingredient::all();
        RecipeStep::factory()
            ->count(250)
            ->create()
            ->each(function ($recipeStep) use ($ingredients) {
                $recipeStep->ingredients()->attach(
                    $ingredients->random(rand(1, 3))->pluck('id')->toArray()
                );
            });
    }

}
