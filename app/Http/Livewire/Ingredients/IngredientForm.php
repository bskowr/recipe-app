<?php

namespace App\Http\Livewire\Ingredients;

use Livewire\Component;
use App\Models\Ingredient;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IngredientForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    use WithFileUploads;
    public Ingredient $ingredient;
    public $image;
    public $imageURL;
    public bool $imageExists;
    public Bool $editMode;

    public function rules(){
        return [
            'ingredient.name' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'unique:ingredients,name'.($this->editMode ? (','.$this->ingredient->id) : ''),
            ],
            'ingredient.description' => [
                'nullable',
                'string',
            ],
            'ingredient.ingredient_category_id' => [
                'required',
                'integer',
                'exists:ingredient_categories,id',
            ],
            'image' => [
                'nullable',
                'image',
            ],
            'ingredient.price' => [
                'nullable',
                'numeric',
                'gt:0',
            ],
            'ingredient.owned_amount' => [
                'nullable',
                'numeric',
                'gt:0'
            ],
            'ingredient.unit' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function validationAttributes(){
        return [
            'name' => __('ingredients.attributes.name'),
            'description' => __('ingredients.attributes.description'),
            'ingredient_category_id' => __('ingredients.attributes.ingredient_category_id'),
            'image' => __('ingredients.attributes.image'),
            'price' => __('ingredients.attributes.price'),
            'owned_amount' => __('ingredients.attributes.owned_amount'),
            'unit' => __('ingredients.attributes.unit'),
        ];
    }

    public function mount(Ingredient $ingredient, Bool $editMode){
        $this->ingredient = $ingredient;
        $this->imageChange();
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
        
        $ingredient = $this->ingredient;
        $image = $this->image;
        if ($image !== null) {
            $ingredient->image = $ingredient->id.'.'.$this->image->getClientOriginalExtension();
        }
        $ingredient->save();
        
        if ($image !== null) {
            $this->image->storeAs(
                '',
                $ingredient->image,
                'public'
            );
        }

        $this->notification()->success(
            $title = $this->editMode ?
                __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode ?
            __('translation.messages.successes.updated', ['name' => $this->ingredient->name])
            : __('translation.messages.successes.stored', ['name' => $this->ingredient->name])
        );
        return redirect()->to('/ingredients');
    }

    public function confirmDeleteImage(){
        $this->dialog()->confirm([
            'title' => __('ingredients.dialogs.image_delete.title'),
            'description' => __('ingredients.dialogs.image_delete.description', [
                'name' => $this->ingredient->name,
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'deleteImage'
            ],
            'reject' => [
                'label' => __('translation.no'),
            ],
        ]);
    }

    public function deleteImage(){
        if (Storage::disk('public')->delete($this->ingredient->image)) {
            $this->ingredient->image = null;
            $this->ingredient->save();
            $this->imageChange();
            $this->notification()->success(
                $title = __('ingredients.messages.successes.image_deleted.title'),
                $description = __('ingredients.messages.successes.image_deleted.$description', ['name' => $this->ingredient->name]),
            );
            return;
        }
        $this->notification()->error(
            $title = __('ingredients.messages.errors.image_deleted.title'),
            $description = __('ingredients.messages.errors.image_deleted.$description')
        );
    }

    public function imageChange(){
        $this->imageExists = $this->ingredient->imageExists();
        $this->imageURL = $this->ingredient->imageURL();
    }

    public function render()
    {
        return view('livewire.ingredients.ingredient-form');
    }
}
