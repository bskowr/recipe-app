<?php

namespace App\Policies;

use App\Models\IngredientCategory;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IngredientCategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('ingredient_categories.index');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('ingredient_categories.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, IngredientCategory $ingredientCategory): bool
    {
        return $ingredientCategory->deleted_at === null && $user->can('ingredient_categories.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, IngredientCategory $ingredientCategory): bool
    {
        return $ingredientCategory->deleted_at === null && $user->can('ingredient_categories.delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, IngredientCategory $ingredientCategory): bool
    {
        return $ingredientCategory->deleted_at !== null && $user->can('ingredient_categories.restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, IngredientCategory $ingredientCategory): bool
    {
        return $user->hasRole(config('auth.roles.admin'));
    }
}
