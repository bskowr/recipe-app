<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* seed roles, permissions and users */
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        /* seed recipe categories */
        $this->call(RecipeCategorySeeder::class);
        /* seed ingredient categories */
        $this->call(IngredientCategorySeeder::class);
        /* seed ingredients */
        $this->call(IngredientSeeder::class);
        /* seed recipes */
        $this->call(RecipeSeeder::class);
        $this->call(RecipeStepSeeder::class);
    }
}
