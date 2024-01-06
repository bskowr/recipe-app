<?php

namespace App\Http\Livewire\Recipes\Filters;
use App\Models\RecipeCategory;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class RecipeCategoryFilter extends Filter
{
    public $title = '';
    public function __construct(){
        parent::__construct();
        $this->title = __('recipes.filters.category');
    }

    public function apply(Builder $query, $value, $request): Builder {
        return $query->whereHas('recipe_categories', function ($query) use ($value){
            $query->where('name', 'like', '%'.$value.'%');
        });
    }

    public function options(): array
    {
        $recipe_categories = RecipeCategory::all();
        $labels = $recipe_categories->pluck('name');
        $values = $recipe_categories->pluck('id');
        return $labels->combine($values)->toArray();
    }
}
