<?php

namespace App\Http\Livewire\Recipes\Actions;
use Illuminate\View\View;
use LaravelViews\Actions\RedirectAction;

class ViewStepsRecipeAction extends RedirectAction
{
    public function __construct(
        string $to,
        string $title,
        string $icon = 'search'
    )
    {
        parent::__construct($to, $title, $icon);
    }
}
