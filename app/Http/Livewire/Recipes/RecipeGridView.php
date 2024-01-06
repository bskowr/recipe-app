<?php

namespace App\Http\Livewire\Recipes;

use App\Models\Recipe;
use WireUi\Traits\Actions;
use LaravelViews\Views\GridView;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Recipes\Actions\EditRecipeAction;
use App\Http\Livewire\Recipes\Actions\RestoreRecipeAction;
use App\Http\Livewire\Recipes\Filters\RecipeCategoryFilter;
use App\Http\Livewire\Recipes\Actions\SoftDeleteRecipeAction;

class RecipeGridView extends GridView
{
    use Actions;
    use SoftDelete;
    
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Recipe::class;
    public $maxCols = 5;
    public $cardComponent = 'livewire.recipes.grid-view-item';
    public $searchBy = [
        'name', 'description', 'recipeCategory.name'
    ];

    public function repository(): Builder
    {
        $query = Recipe::query()->with(['recipeCategory']);
        if (request()->user()->can('recipes.restore')) {
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
            'category' => $model->recipeCategory->name,
            'description' => $model->description,
            'estimated_time' => $model->estimated_time,
            'portions' => $model->portions,
        ];
    }

    protected function filters() {
        return [
            new RecipeCategoryFilter,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new EditRecipeAction(
                'recipes.edit',
                __('recipes.actions.edit')
            ),
            new SoftDeleteRecipeAction(
                __('recipes.actions.soft_delete')
            ),
            new RestoreRecipeAction()
        ];
    }

    public function restore(int $id){
        $recipe = Recipe::withTrashed()->find($id);
        $recipe->restore();
        $this->notification()->success(
            $title = __('recipes.messages.successes.restore.title'),
            $description = __('recipes.messages.successes.restore.description', ['name' => $recipe->name])
        );
    }
}