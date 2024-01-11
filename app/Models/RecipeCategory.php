<?php

namespace App\Models;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecipeCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];

    public function recipes(){
        return $this->hasMany(Recipe::class);
    }
}
