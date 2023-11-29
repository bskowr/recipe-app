<?php

namespace App\Http\Livewire;

use App\Http\Livewire\RecipeCategories\Actions\EditRecipeCategoryAction;
use LaravelViews\Views\TableView;

class RecipeCategoriesTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = RecipeCategory::class;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [

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

    protected function actionsByRow(){
        return [
            new EditRecipeCategoryAction(
                'recipe_categories.edit',
                __('recipe_categories.actions.edit')
            )
        ];
    }
}
