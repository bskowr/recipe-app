<?php

namespace App\Http\Livewire\Recipes\Steps;

use App\Models\Recipe;
use App\Models\RecipeStep;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\ListView;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Recipes\Steps\Actions\EditRecipeStepAction;
use App\Http\Livewire\Recipes\Steps\Actions\DeleteRecipeStepAction;

class RecipeStepListView extends ListView
{
    use Actions;

    protected $model = RecipeStep::class;
    public $itemComponent = 'recipes.steps.list-view-item';
    public $recipe = '';
    public $searchBy = [];
    protected $paginate = 25;
    public function repository(): Builder
    {
        return RecipeStep::query()->where('recipe_id','=',$this->recipe->id)->orderBy('step_number');
    }

    public function actionsByRow(){
        return [
            new EditRecipeStepAction(
                'recipes.steps.edit',
                __('recipe_steps.actions.edit'),
                $this->recipe,
            ),
            new DeleteRecipeStepAction(),
        ];
    }

    public function data($model)
    {
        return [
            'step' => $model,
            'actions' => $this->getActions()
        ];
    }

    public function delete($id){
        RecipeStep::find($id)->delete();
    }
}
