<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Undocumented function
     *
     * @return
     */
    public function index(){
        $this->authorize('viewAny', Ingredient::class);
        return view(
            'ingredient.index',
            [
                'ingredient' => Ingredient::all()
            ]
        );
    }

    /**
     * Undocumented function
     *
     * @return
     */
    public function create(){
        $this->authorize('create', Ingredient::class);
        return view(
            'ingredient.form'
        );
    }

    /**
     * Undocumented function
     *
     * @param Ingredient $ingredient
     * @return
     */
    public function edit(Ingredient $ingredient){
        $this->authorize('update', $ingredient);
        return view(
            'ingredient.form',
            [
                'ingredient' => $ingredient,
            ]
        );
    }
}
