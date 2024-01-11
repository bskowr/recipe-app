<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecipeStep extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'estimated_time',
        'step_number',
        'image',
        'recipe_id',
    ];

    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class);
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
