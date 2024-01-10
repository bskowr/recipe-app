<?php

namespace App\Http\Livewire\Recipes\Steps\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class DeleteRecipeStepAction extends Action
{
    public $title;
    public $icon = "x";

    public function __construct()
    {
        parent::__construct();
        $this->title = __('recipe_steps.actions.delete');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('recipe_steps.dialogs.delete.title'),
            'description' => __('recipe_steps.dialogs.delete.description', ['name' => $model->name]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'delete',
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
