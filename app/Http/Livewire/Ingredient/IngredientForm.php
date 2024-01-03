<?php

namespace App\Http\Livewire\Ingredient;

use Livewire\Component;
use App\Models\Ingredient;
use WireUi\Traits\Actions;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IngredientForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    public Ingredient $ingredient;
    public Bool $editMode;

    public function rules(){
        return [
            'ingredient.name' => [
                'required',
                'string',
                'min:3',
                'unique:ingredient,name'.($this->editMode ? (','.$this->ingredient->id) : '')
            ],
            'ingredient.description' => [
                'string'
            ],
        ];
    }

    public function validationAttributes(){
        return [
            'name' => __('ingredient.attributes.name'),
            'description' => __('ingredient.attributes.description'),
        ];
    }

    public function mount(Ingredient $ingredient, Bool $editMode){
        $this->ingredient = $ingredient;
        $this->editMode = $editMode;
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function save(){
        if($this->editMode){
            $this->authorize('update', $this->ingredient);
        } else {
            $this->authorize('create', Ingredient::class);
        }
        $this->validate();
        $this->ingredient->save();
        $this->notification()->success(
            $title = $this->editMode ?
                __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode ?
            __('translation.messages.successes.updated', ['name' => $this->ingredient->name])
            : __('translation.messages.successes.stored', ['name' => $this->ingredient->name])
        );
        $this->editMode = true;
    }

    public function render()
    {
        return view('livewire.ingredient.ingredient-form');
    }
}
