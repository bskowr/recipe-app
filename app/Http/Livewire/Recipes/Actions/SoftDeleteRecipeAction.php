<?php

namespace App\Http\Livewire\Recipes\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\SoftDeleteAction;

class SoftDeleteRecipeAction extends SoftDeleteAction
{
    public function __construct(?string $title = null)
    {
        parent::__construct($title);
    }
    protected function dialogTitle(): String
    {
        return __('recipes.dialogs.soft_delete.title');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('recipes.dialogs.soft_delete.description', [
            'name' => $model->name
        ]);
    }
}
