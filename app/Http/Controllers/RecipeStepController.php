<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\RecipeStep;
use Illuminate\Http\Request;

class RecipeStepController extends Controller
{
    public function index(Recipe $recipe){
        $this->authorize('viewAny', Recipe::class);
        return view(
            'recipes.steps.index',
            [
                'recipe' => $recipe
            ]
        );
    }
    public function create(Recipe $recipe){
        $this->authorize('create', Recipe::class);
        return view(
            'recipes.steps.form',
            [
                'recipe' => $recipe
            ]
        );
    }

    public function edit(Recipe $recipe, RecipeStep $step){
        $this->authorize('update', $recipe);
        return view(
            'recipes.steps.form',
            [
                'step' => $step,
                'recipe' => $recipe
            ]
        );
    }
}
