<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Facades\IngredientRepository;

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
            'ingredients.index',
            [
                'ingredients' => Ingredient::all()
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
            'ingredients.form'
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
            'ingredients.form',
            [
                'ingredient' => $ingredient,
            ]
        );
    }
    
    public function async(Request $request){
        return IngredientRepository::select(
            $request->search,
            $request->selected,
        );
    }
}
