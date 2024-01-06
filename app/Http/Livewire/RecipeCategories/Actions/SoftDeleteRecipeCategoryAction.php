<?php

namespace App\Http\Livewire\RecipeCategories\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\SoftDeleteAction;


class SoftDeleteRecipeCategoryAction extends SoftDeleteAction
{
    public function __construct(?string $title = null)
    {
        parent::__construct($title);
    }
    protected function dialogTitle(): String
    {
        return __('recipe_category.dialogs.soft_delete.title');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('recipe_category.dialogs.soft_delete.description', [
            'name' => $model
        ]);
    }
}
