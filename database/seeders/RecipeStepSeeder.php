<?php

namespace Database\Seeders;

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
        RecipeStep::factory()->count(250)->create();
    }
}
