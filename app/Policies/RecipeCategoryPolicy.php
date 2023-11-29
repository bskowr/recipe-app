<?php

namespace App\Policies;

use App\Models\RecipeCategory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class RecipeCategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('recipe_categories.index');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('recipe_categories.manage');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RecipeCategory $recipeCategory): bool
    {
        return $recipeCategory->deleted_at === null && $user->can('recipe_categories.manage');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RecipeCategory $recipeCategory): bool
    {
        return $recipeCategory->deleted_at === null && $user->can('recipe_categories.manage');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RecipeCategory $recipeCategory): bool
    {
        return $recipeCategory->deleted_at !== null && $user->can('recipe_categories.manage');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RecipeCategory $recipeCategory): bool
    {
        return $user->hasRole(config('auth.roles.admin'));
    }
}
