<?php

namespace App\Http\Livewire\Ingredients;

use App\Models\Ingredient;
use WireUi\Traits\Actions;
use LaravelViews\Views\GridView;
use App\Models\IngredientCategory;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Ingredients\Actions\EditIngredientAction;
use App\Http\Livewire\Ingredients\Actions\RestoreIngredientAction;
use App\Http\Livewire\Ingredients\Filters\IngredientCategoryFilter;
use App\Http\Livewire\Ingredients\Actions\SoftDeleteIngredientAction;

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

    protected function actionsByRow()
    {
        return [
            new EditIngredientAction(
                'ingredients.edit',
                __('ingredients.actions.edit')
            ),
            new SoftDeleteIngredientAction(
                __('ingredients.actions.soft_delete')
            ),
            new RestoreIngredientAction()
        ];
    }

    public function restore(int $id){
        $ingredient = Ingredient::withTrashed()->find($id);
        $ingredient->restore();
        $this->notification()->success(
            $title = __('ingredients.messages.successes.restore.title'),
            $description = __('ingredients.messages.successes.restore.description', ['name' => $ingredient->name])
        );
    }
}
