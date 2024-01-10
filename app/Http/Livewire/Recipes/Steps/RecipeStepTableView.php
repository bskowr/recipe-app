<?php

namespace App\Http\Livewire\Recipes\Steps;

use App\Models\Recipe;
use App\Models\RecipeStep;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Recipes\Steps\Actions\EditRecipeStepAction;
use App\Http\Livewire\Recipes\Steps\Actions\DeleteRecipeStepAction;

class RecipeStepTableView extends TableView
{
    use Actions;

    protected $model = RecipeStep::class;
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
    public function row($model): array
    {
        return [
            $model->name,
            $model->description,
            $model->step_number,
            $model->estimated_time
        ];
    }

    public function delete($id){
        RecipeStep::find($id)->delete();
    }
}
