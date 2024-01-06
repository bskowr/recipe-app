<?php

namespace App\Http\Livewire\Recipes\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class RestoreRecipeAction extends Action
{
    public $title;
    public $icon = "clipboard";

    public function __construct()
    {
        parent::__construct();
        $this->title = __('recipes.actions.restore');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('recipes.dialogs.restore.title'),
            'description' => __('recipes.dialogs.restore.description', ['name' => $model->name]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'restore',
                'params' => $model->id
            ],
            'reject' => [
                'label' => __('translation.no'),
            ],
        ]);
    }

    public function renderIf($model, View $view){
        return request()->user()->can('restore', $model);
    }
}
