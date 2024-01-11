<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name'=>'users.index']);
        Permission::create(['name'=>'users.store']);
        Permission::create(['name'=>'users.destroy']);
        Permission::create(['name'=>'users.change_role']);
        Permission::create(['name'=>'recipe_categories.index']);
        Permission::create(['name'=>'recipe_categories.create']);
        Permission::create(['name'=>'recipe_categories.update']);
        Permission::create(['name'=>'recipe_categories.delete']);
        Permission::create(['name'=>'recipe_categories.restore']);
        Permission::create(['name'=>'ingredient_categories.index']);
        Permission::create(['name'=>'ingredient_categories.create']);
        Permission::create(['name'=>'ingredient_categories.update']);
        Permission::create(['name'=>'ingredient_categories.delete']);
        Permission::create(['name'=>'ingredient_categories.restore']);
        Permission::create(['name'=>'ingredients.index']);
        Permission::create(['name'=>'ingredients.create']);
        Permission::create(['name'=>'ingredients.update']);
        Permission::create(['name'=>'ingredients.delete']);
        Permission::create(['name'=>'ingredients.restore']);
        Permission::create(['name'=>'recipes.index']);
        Permission::create(['name'=>'recipes.create']);
        Permission::create(['name'=>'recipes.update']);
        Permission::create(['name'=>'recipes.delete']);
        Permission::create(['name'=>'recipes.restore']);
        
        /* add permissions to admin role */
        $userRole = Role::findByName(config('auth.roles.admin'));
        $userRole->givePermissionTo('users.index');
        $userRole->givePermissionTo('users.store');
        $userRole->givePermissionTo('users.destroy');
        $userRole->givePermissionTo('users.change_role');
        $userRole->givePermissionTo('recipe_categories.index');
        $userRole->givePermissionTo('recipe_categories.create');
        $userRole->givePermissionTo('recipe_categories.update');
        $userRole->givePermissionTo('recipe_categories.delete');
        $userRole->givePermissionTo('recipe_categories.restore');
        $userRole->givePermissionTo('ingredient_categories.index');
        $userRole->givePermissionTo('ingredient_categories.create');
        $userRole->givePermissionTo('ingredient_categories.update');
        $userRole->givePermissionTo('ingredient_categories.delete');
        $userRole->givePermissionTo('ingredient_categories.restore');
        $userRole->givePermissionTo('ingredients.index');
        $userRole->givePermissionTo('ingredients.create');
        $userRole->givePermissionTo('ingredients.update');
        $userRole->givePermissionTo('ingredients.delete');
        $userRole->givePermissionTo('ingredients.restore');
        $userRole->givePermissionTo('recipes.index');
        $userRole->givePermissionTo('recipes.create');
        $userRole->givePermissionTo('recipes.update');
        $userRole->givePermissionTo('recipes.delete');
        $userRole->givePermissionTo('recipes.restore');
                
        /* add permissions to editor role */
        $userRole = Role::findByName(config('auth.roles.editor'));
        $userRole->givePermissionTo('recipe_categories.index');
        $userRole->givePermissionTo('ingredient_categories.index');
        $userRole->givePermissionTo('ingredients.index');
        $userRole->givePermissionTo('ingredients.create');
        $userRole->givePermissionTo('ingredients.update');
        $userRole->givePermissionTo('ingredients.delete');
        $userRole->givePermissionTo('recipes.index');
        $userRole->givePermissionTo('recipes.create');
        $userRole->givePermissionTo('recipes.update');
        $userRole->givePermissionTo('recipes.delete');
                
        /* add permissions to reader role */
        $userRole = Role::findByName(config('auth.roles.reader'));
        $userRole->givePermissionTo('recipe_categories.index');
        $userRole->givePermissionTo('ingredient_categories.index');
        $userRole->givePermissionTo('ingredients.index');
        $userRole->givePermissionTo('recipes.index');
    }
}
