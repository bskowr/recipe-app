<?php

namespace App\Http\Livewire\Ingredient;

use App\Models\Ingredient;
use WireUi\Traits\Actions;
use LaravelViews\Views\GridView;
use App\Models\IngredientCategory;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Database\Eloquent\Builder;

class ingredientGridView extends GridView
{
    use Actions;
    use SoftDelete;
    
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Ingredient::class;
    public $searchBy = [
        'name'
    ];

    public function repository(): Builder
    {
        return Ingredient::query()->withTrashed();
    }

    /**
     * Sets the data to every card on the view
     *
     * @param $model Current model for each card
     */
    public function card($model)
    {
        return [
            'image' => '',
            'title' => $model->name,
            'subtitle' => IngredientCategory::withTrashed()->find($model->ingredient_category_id)->name,
            'description' => $model->description
        ];
    }
}
