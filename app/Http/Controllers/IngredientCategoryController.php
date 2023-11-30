<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngredientCategory;

class IngredientCategoryController extends Controller
{
    /**
     * Undocumented function
     *
     * @return
     */
    public function index(){
        $this->authorize('viewAny', IngredientCategory::class);
        return view(
            'ingredient_categories.index',
            [
                'ingredient_categories' => IngredientCategory::all()
            ]
        );
    }

    /**
     * Undocumented function
     *
     * @return
     */
    public function create(){
        $this->authorize('create', IngredientCategory::class);
        return view(
            'ingredient_categories.form'
        );
    }

    /**
     * Undocumented function
     *
     * @param IngredientCategory $ingredientCategory
     * @return
     */
    public function edit(IngredientCategory $ingredientCategory){
        $this->authorize('update', $ingredientCategory);
        return view(
            'ingredient_categories.form',
            [
                'ingredientCategory' => $ingredientCategory,
            ]
        );
    }
}
