<?php

namespace App\Http\Livewire\RecipeCategories;

use App\Models\RecipeCategory;
use Livewire\Component;

class RecipeCategoryForm extends Component
{
    use Actions;

    public RecipeCategory $recipe_category;
    public Bool $editMode;
    public function render()
    {
        return view('livewire.recipe-categories.recipe-category-form');
    }
}
