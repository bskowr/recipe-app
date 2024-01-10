<?php

namespace App\Http\Livewire\Recipes\Actions;
use Illuminate\View\View;
use LaravelViews\Actions\RedirectAction;

class ViewStepsRecipeAction extends RedirectAction
{
    public function __construct(
        string $to = 'recipes.steps.index',
        string $title = __('recipes.steps.index'),
        string $icon = "x"
    )
    {
        parent::__construct($to, $title, $icon);
    }
}
