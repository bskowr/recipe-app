<?php
namespace App\Http\Livewire\RecipeCategories\Actions;

use LaravelViews\Views\View;
use Illuminate\Support\Facades\Auth;
use LaravelViews\Actions\RedirectAction;

class EditRecipeCategoryAction extends RedirectAction
{


    public function __construct(
        string $to,
        string $title,
        string $icon = "edit"
    )
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return $model->deleted_at === null;
    }
}