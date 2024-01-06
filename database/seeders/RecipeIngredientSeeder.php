<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RecipeIngredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecipeIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecipeIngredient::factory()->count(1000)->create();
    }
}
