<?php

namespace App\Http\Controllers;

use App\Models\RecipeCategory;
use Illuminate\Http\Request;

class RecipeCategoryController extends Controller
{
    /**
     * Undocumented function
     *
     * @return
     */
    public function index(){
        $this->authorize('viewAny', RecipeCategory::class);
        return view(
            'recipe_categories.index',
            [
                'recipe_categories' => RecipeCategory::all()
            ]
        );
    }

    /**
     * Undocumented function
     *
     * @return
     */
    public function create(){
        $this->authorize('create', RecipeCategory::class);
        return view(
            'recipe_categories.form'
        );
    }

    /**
     * Undocumented function
     *
     * @param RecipeCategory $recipeCategory
     * @return
     */
    public function edit(RecipeCategory $recipeCategory){
        $this->authorize('update', $recipeCategory);
        return view(
            'recipe_categories.form',
            [
                'recipeCategory' => $recipeCategory,
            ]
        );
    }
}
