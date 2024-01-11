<?php

namespace App\Http\Livewire\IngredientCategories;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\IngredientCategory;

class IngredientCategoryForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    public IngredientCategory $ingredientCategory;
    public Bool $editMode;

    public function rules(){
        return [
            'ingredientCategory.name' => [
                'required',
                'string',
                'min:3',
                'unique:ingredient_categories,name'.($this->editMode ? (','.$this->ingredientCategory->id) : '')
            ]
        ];
    }

    public function validationAttributes(){
        return [
            'name' => __('ingredient_categories.attributes.name'),
        ];
    }

    public function mount(IngredientCategory $ingredientCategory, Bool $editMode){
        $this->ingredientCategory = $ingredientCategory;
        $this->editMode = $editMode;
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        if($this->editMode){
            $this->authorize('update', $this->ingredientCategory);
        } else {
            $this->authorize('create', IngredientCategory::class);
        }
        $this->validate();
        $this->ingredientCategory->save();
        $this->notification()->success(
            $title = $this->editMode ?
                __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode ?
            __('translation.messages.successes.updated', ['name' => $this->ingredientCategory->name])
            : __('translation.messages.successes.stored', ['name' => $this->ingredientCategory->name])
        );
        return redirect()->to('/ingredient_categories');
    }

    public function render()
    {
        return view('livewire.ingredient-categories.ingredient-category-form');
    }
}
