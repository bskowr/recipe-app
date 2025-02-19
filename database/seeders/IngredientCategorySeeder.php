<?php

namespace Database\Seeders;

use App\Models\IngredientCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IngredientCategory::factory()->count(50)->create();
    }
}
