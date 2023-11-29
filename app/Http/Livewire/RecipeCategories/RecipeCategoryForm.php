<?php

namespace App\Http\Livewire\RecipeCategories;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\RecipeCategory;

class RecipeCategoryForm extends Component
{
    use Actions;

    public RecipeCategory $recipeCategory;
    public Bool $editMode;

    public function rules(){
        return [
            'recipe_category.name' => [
                'required',
                'string',
                'min:3',
                'unique:recipe_categories,name'.($this->editMode ? (','+$this->recipeCategory->id) : '')
            ]
        ];
    }

    public function validationAttributes(){
        return [
            'name' => __('recipe_categories.attributes.name'),
        ];
    }

    public function mount(RecipeCategory $recipeCategory, Bool $editMode){
        $this->recipeCategory = $recipeCategory;
        $this->editMode = $editMode;
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        $this->validate();
        $this->recipeCategory->save();
        $this->notification()->success(
            $title = $this->editMode ?
                __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode ?
            __('translation.messages.successes.updated', ['name' => $this->recipeCategory->name])
            : __('translation.messages.successes.stored', ['name' => $this->recipeCategory->name])
        );
        $this->editMode = true;
    }

    public function render()
    {
        return view('livewire.recipe-categories.recipe-category-form');
    }
}
