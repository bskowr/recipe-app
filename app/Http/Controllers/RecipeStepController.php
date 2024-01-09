<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeStep;
use Illuminate\Http\Request;

class RecipeStepController extends Controller
{
    public function create(Recipe $recipe){
        $this->authorize('create', Recipe::class);
        return view(
            'recipes.steps.form',
            [
                'recipe' => $recipe
            ]
        );
    }

    public function edit(Recipe $recipe, RecipeStep $recipeStep){
        $this->authorize('update', $recipe);
        return view(
            'recipes.steps.form',
            [
                'recipeStep' => $recipeStep,
                'recipe' => $recipe
            ]
        );
    }
}
