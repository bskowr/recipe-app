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
                'recipe_category' => $model->recipeCategory->name,
                'name' => $model->name,
                'description' => $model->description,
                'image' => $model->image,
                'estimated_time' => $model->estimated_time,
                'portions' => $model->portions
        ];
    }

    public function actions(){
        return [
            new ViewStepsRecipeAction()
        ];
    }
}
