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
    public $searchBy = [
        'name',
        'description',
        'step_number'
    ];
    protected $paginate = 25;
    public function repository(): Builder
    {
        return RecipeStep::query()->where('recipe_id','=',$this->recipe->id);
    }
    public function headers(): array
    {
        return [
            Header::title(__('recipes.steps.attributes.name'))->sortBy('name'),
            Header::title(__('recipes.steps.attributes.description'))->sortBy('description'),
            Header::title(__('recipes.steps.attributes.step_number'))->sortBy('step_number'),
            Header::title(__('recipes.steps.attributes.estimated_time'))->sortBy('estimated_time'),
            Header::title(__('recipes.steps.attributes.ingredients'))
        ];
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
            'step_name' => $model->name,
            'step_description' => $model->description,
            'step_step_number' => $model->step_number,
            'step_estimated_time' => $model->estimated_time,
            'ingredients' => $model->ingredients,
        ];
    }


    public function delete($id){
        RecipeStep::find($id)->delete();
    }
}
