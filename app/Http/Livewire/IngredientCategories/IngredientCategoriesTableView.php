<?php

namespace App\Http\Livewire\IngredientCategories;

use WireUi\Traits\Actions;
use App\Models\IngredientCategory;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\IngredientCategories\Actions\EditIngredientCategoryAction;
use App\Http\Livewire\IngredientCategories\Actions\RestoreIngredientCategoryAction;
use App\Http\Livewire\IngredientCategories\Actions\SoftDeleteIngredientCategoryAction;

class IngredientCategoriesTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = IngredientCategory::class;
    public $searchBy = [
        'name'
    ];
    protected $paginate = 25;

    public function repository(): Builder
    {
        return IngredientCategory::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('ingredient_categories.attributes.name'))->sortBy('name'),
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
            new EditIngredientCategoryAction(
                'ingredient_categories.edit',
                __('ingredient_categories.actions.edit')
            ),
            new SoftDeleteIngredientCategoryAction(),
            new RestoreIngredientCategoryAction()
        ];
    }

    public function softDelete(int $id){
        $ingredientCategory = IngredientCategory::find($id);
        $ingredientCategory->delete();
        $this->notification()->success(
            $title = __('ingredient_categories.messages.successes.soft_delete.title'),
            $description = __('ingredient_categories.messages.successes.soft_delete.description', ['name' => $ingredientCategory->name])
        );
    }

    public function restore(int $id){
        $ingredientCategory = IngredientCategory::withTrashed()->find($id);
        $ingredientCategory->restore();
        $this->notification()->success(
            $title = __('ingredient_categories.messages.successes.restore.title'),
            $description = __('ingredient_categories.messages.successes.restore.description', ['name' => $ingredientCategory->name])
        );
    }
}
