<?php

namespace App\Http\Livewire\Recipes;

use App\Http\Livewire\Recipes\Actions\ViewStepsRecipeAction;
use App\Models\Recipe;
use LaravelViews\Facades\UI;
use LaravelViews\Views\DetailView;

class RecipeDetailView extends DetailView
{
    public $title = '';
    public $subtitle = '';
    public function __construct($id = null){
        parent::__construct($id);
        $title = __("translation.navigation.recipes");
    }

    public function detail($model)
    {
        return [
                __('recipes.attributes.recipe_category_id') => $model->recipeCategory->name,
                __('recipes.attributes.name') => $model->name,
                __('recipes.attributes.description') => $model->description,
                __('recipes.attributes.image') => $model->image,
                __('recipes.attributes.estimated_time') => $model->estimated_time,
                __('recipes.attributes.portions') => $model->portions
        ];
    }

    public function actions(){
        return [
            new ViewStepsRecipeAction(
                'recipes.steps.index',
                __('recipe_steps.steps'),
            )
        ];
    }
}
