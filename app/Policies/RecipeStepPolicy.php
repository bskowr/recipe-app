<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RecipeStep;

class RecipeStepPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('recipes.index');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('recipes.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RecipeStep $recipeStep): bool
    {
        return $recipeStep->deleted_at === null && $user->can('recipes.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RecipeStep $recipeStep): bool
    {
        return $recipeStep->deleted_at === null && $user->can('recipes.delete');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RecipeStep $recipeStep): bool
    {
        return $user->hasRole(config('auth.roles.admin'));
    }
}
