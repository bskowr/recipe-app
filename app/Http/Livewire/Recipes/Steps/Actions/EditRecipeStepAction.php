<?php
namespace App\Http\Livewire\Recipes\Steps\Actions;

use App\Models\Recipe;
use LaravelViews\Views\View;
use LaravelViews\Actions\RedirectAction;

class EditRecipeStepAction extends RedirectAction
{

    protected Recipe $recipe;

    public function __construct(
        string $to,
        string $title,
        Recipe $recipe,
        string $icon = "edit",
    )
    {
        parent::__construct($to, $title, $icon);
        $this->recipe = $recipe;
    }

    public function handle($item)
    {
        return redirect()->route($this->to, ['recipe' => $this->recipe, 'step' => $item]);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('update', $model);
    }
}