<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'ingredient_category_id', 'price', 'owned_amount', 'unit'
    ];

    public function ingredientCategory(){
        return $this->belongsTo(IngredientCategory::class);
    }

    public function recipeSteps(){
        return $this->belongsToMany(RecipeStep::class);
    }

    protected function image(): Attribute {
        return Attribute::make(
            get: function ($value) {
                if ($value === null) {
                    return null;
                }
                return config('filesystems.images_dir') . '/' . $value;
            }
        );
    }

    public function imageURL(): string {
        return $this->imageExists() ? Storage::url($this->image) : Storage::url(config('filesystems.default_image'));
    }

    public function imageExists(): bool {
        return $this->image !== null && Storage::disk('public')->exists($this->image);
    }
}
