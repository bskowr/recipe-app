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
        
        /* przypisanie uprawnien do roli admin */
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
    }
}
