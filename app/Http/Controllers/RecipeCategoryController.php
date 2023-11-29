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
    public function create(){
        return view(
            'categories.form'
        );
    }

    /**
     * Undocumented function
     *
     * @param RecipeCategory $recipeCategory
     * @return
     */
    public function edit(RecipeCategory $recipeCategory){
        return view(
            'recipe_categories.form',
            [
                'recipe_category' => $recipeCategory,
            ]
        );
    }
    public function index(){
        return view(
            'recipe_categories.index',
            [
                'recipe_categories' => RecipeCategory::all()
            ]
        );
    }
}
