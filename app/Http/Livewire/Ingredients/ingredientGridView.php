<?php

namespace App\Http\Livewire\Ingredients;

use App\Http\Livewire\Ingredients\Filters\IngredientCategoryFilter;
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
    public $maxCols = 5;
    public $cardComponent = 'livewire.ingredients.grid-view-item';
    public $searchBy = [
        'name', 'description', 'ingredientCategory.name'
    ];

    public function repository(): Builder
    {
        $query = Ingredient::query()->with(['ingredientCategory']);
        if (request()->user()->can('ingredients.restore')) {
            $query->withTrashed();
        }
        return $query;
    }

    /**
     * Sets the data to every card on the view
     *
     * @param $model Current model for each card
     */
    public function card($model)
    {
        return [
            'image' => $model->imageURL(),
            'title' => $model->name,
            'category' => $model->ingredientCategory->name,
            'description' => $model->description,
            'price' => $model->price,
            'owned_amount' => $model->owned_amount,
            'unit' => $model->unit,
        ];
    }

    protected function filters() {
        return [
            new IngredientCategoryFilter,
        ];
    }
}
