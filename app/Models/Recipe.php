<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'recipe_category_id',
        'image',
        'estimated_time',
        'portions'
    ];

    public function recipeCategory(){
        return $this->belongsTo(RecipeCategory::class)->withTrashed();
    }

    public function recipeSteps(){
        return $this->hasMany(RecipeStep::class);
    }

    public function recipeIngredients(){
        return $this->hasManyThrough(RecipeIngredient::class, RecipeStep::class);
        
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value === null) {
                    return null;
                }
                return config('filesystems.images_dir') . '/' . $value;
            },
        );
    }

    public function imageUrl(): string
    {
        return $this->imageExists() ? Storage::url($this->image) : Storage::url(config('filesystems.default_image'));
    }

    public function imageExists(): bool
    {
        return $this->image !== null && Storage::disk('public')->exists($this->image);
    }
}
