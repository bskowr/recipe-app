<?php

namespace App\Http\Livewire\Ingredients\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class RestoreIngredientAction extends Action
{
    public $title;
    public $icon = "clipboard";

    public function __construct()
    {
        parent::__construct();
        $this->title = __('ingredients.actions.restore');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('ingredients.dialogs.restore.title'),
            'description' => __('ingredients.dialogs.restore.description', ['name' => $model->name]),
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
