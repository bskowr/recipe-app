<?php

namespace App\Http\Livewire\RecipeCategories;

use App\Http\Livewire\Traits\SoftDelete;
use WireUi\Traits\Actions;
use App\Models\RecipeCategory;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\RecipeCategories\Actions\EditRecipeCategoryAction;
use App\Http\Livewire\RecipeCategories\Actions\RestoreRecipeCategoryAction;
use App\Http\Livewire\RecipeCategories\Actions\SoftDeleteRecipeCategoryAction;

class RecipeCategoriesTableView extends TableView
{
    use Actions;
    use SoftDelete;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = RecipeCategory::class;
    public $searchBy = [
        'name'
    ];
    protected $paginate = 25;

    public function repository(): Builder
    {
        return RecipeCategory::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('recipe_categories.attributes.name'))->sortBy('name'),
            Header::title(__('translation.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('translation.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('translation.attributes.deleted_at'))->sortBy('deleted_at'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->created_at,
            $model->updated_at,
            $model->deleted_at
        ];
    }

    protected function actionsByRow()
    {
        return [
            new EditRecipeCategoryAction(
                'recipe_categories.edit',
                __('recipe_categories.actions.edit')
            ),
            new SoftDeleteRecipeCategoryAction(
                __('recipe_categories.actions.soft_delete')
            ),
            new RestoreRecipeCategoryAction()
        ];
    }

    public function restore(int $id){
        $recipeCategory = RecipeCategory::withTrashed()->find($id);
        $recipeCategory->restore();
        $this->notification()->success(
            $title = __('recipe_categories.messages.successes.restore.title'),
            $description = __('recipe_categories.messages.successes.restore.description', ['name' => $recipeCategory->name])
        );
    }
}
