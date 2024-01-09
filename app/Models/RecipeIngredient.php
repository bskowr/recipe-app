<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_step_id',
        'ingredient_id',
        'amount_used'
    ];
    
    public function recipeStep(){
        return $this->belongsTo(RecipeStep::class);
    }

    public function ingredient(){
        return $this->belongsTo(Ingredient::class);
    }
}
