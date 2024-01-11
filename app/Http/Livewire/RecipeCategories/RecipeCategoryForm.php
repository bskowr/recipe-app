<?php

namespace App\Http\Livewire\RecipeCategories;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\RecipeCategory;

class RecipeCategoryForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    public RecipeCategory $recipeCategory;
    public Bool $editMode;

    public function rules(){
        return [
            'recipeCategory.name' => [
                'required',
                'string',
                'min:3',
                'unique:recipe_categories,name'.($this->editMode ? (','.$this->recipeCategory->id) : '')
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
        if($this->editMode){
            $this->authorize('update', $this->recipeCategory);
        } else {
            $this->authorize('create', RecipeCategory::class);
        }
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
        return redirect()->to('/recipe_categories');
    }

    public function render()
    {
        return view('livewire.recipe-categories.recipe-category-form');
    }
}
