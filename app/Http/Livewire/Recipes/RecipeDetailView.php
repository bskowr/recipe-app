<?php

namespace App\Http\Livewire\Recipes;

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
            UI::component('recipes.details', [
                'recipe_category' => $model->recipeCategory->name,
                'name' => $model->name,
                'description' => $model->description,
                'image' => $model->imageURL(),
                'estimated_time' => $model->estimated_time,
                'portions' => $model->portions
            ]),
            UI::component('recipes.ingredients-list', [
                'recipe' => $model,
            ]),
            UI::component('recipes.steps-list', [
                'recipe' => $model
            ]),
        ];
    }
}
