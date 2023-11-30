<?php

namespace App\Http\Livewire\IngredientCategories\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class SoftDeleteIngredientCategoryAction extends Action
{
    public $title;
    public $icon = "trash";

    public function __construct()
    {
        parent::__construct();
        $this->title = __('ingredient_categories.actions.soft_delete');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('ingredient_categories.dialogs.soft_delete.title'),
            'description' => __('ingredient_categories.dialogs.soft_delete.description', ['name' => $model->name]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'softDelete',
                'params' => $model->id
            ],
            'reject' => [
                'label' => __('translation.no'),
            ],
        ]);
    }

    public function renderIf($model, View $view){
        return request()->user()->can('delete', $model);
    }
}
