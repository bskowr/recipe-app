<?php

namespace App\Http\Livewire\Ingredients\Filters;
use App\Models\IngredientCategory;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class IngredientCategoryFilter extends Filter
{
    public $title = '';
    public function __construct(){
        parent::__construct();
        $this->title = __('ingredients.filters.category');
    }

    public function apply(Builder $query, $value, $request): Builder {
        return $query->whereHas('ingredient_categories', function ($query) use ($value){
            $query->where('name', 'like', '%'.$value.'%');
        });
    }

    public function options(): array
    {
        $ingreident_categories = IngredientCategory::all();
        $labels = $ingreident_categories->pluck('name');
        $values = $ingreident_categories->pluck('id');
        return $labels->combine($values)->toArray();
    }
}
