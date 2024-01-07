<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Undocumented function
     *
     * @return
     */
    public function index(){
        $this->authorize('viewAny', Recipe::class);
        return view(
            'recipes.index',
            [
                'recipes' => Recipe::all()
            ]
        );
    }

    /**
     * Undocumented function
     *
     * @return
     */
    public function create(){
        $this->authorize('create', Recipe::class);
        return view(
            'recipes.form'
        );
    }

    /**
     * Undocumented function
     *
     * @param Recipe $recipeCategory
     * @return
     */
    public function edit(Recipe $recipe){
        $this->authorize('update', $recipe);
        return view(
            'recipes.form',
            [
                'recipe' => $recipe,
            ]
        );
    }

    public function show(Recipe $recipe){
        $this->authorize('viewAny', $recipe);
        return view(
            'recipes.show',
            [
                'recipe' => $recipe,
            ]
        );
    }
}
