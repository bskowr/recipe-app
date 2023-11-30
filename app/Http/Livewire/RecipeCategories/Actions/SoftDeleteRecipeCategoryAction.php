<?php

namespace App\Http\Livewire\RecipeCategories\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class SoftDeleteRecipeCategoryAction extends Action
{
    public $title;
    public $icon = "trash";

    public function __construct()
    {
        parent::__construct();
        $this->title = __('recipe_categories.actions.soft_delete');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('recipe_categories.dialogs.soft_delete.title'),
            'description' => __('recipe_categories.dialogs.soft_delete.description', ['name' => $model->name]),
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
