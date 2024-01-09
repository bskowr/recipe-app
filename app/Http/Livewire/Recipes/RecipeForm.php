<?php

namespace App\Http\Livewire\Recipes;

use App\Models\Recipe;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecipeForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    use WithFileUploads;
    public Recipe $recipe;
    public $image;
    public $imageURL;
    public bool $imageExists;
    public Bool $editMode;

    public function rules(){
        return [
            'recipe.name' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'unique:recipes,name'.($this->editMode ? (','.$this->recipe->id) : ''),
            ],
            'recipe.description' => [
                'nullable',
                'string',
                'max:512',
            ],
            'recipe.recipe_category_id' => [
                'required',
                'integer',
                'exists:recipe_categories,id',
            ],
            'image' => [
                'nullable',
                'image',
            ],
            'recipe.portions' => [
                'integer',
                'gt:0',
            ],
            'recipe.estimated_time' => []
        ];
    }

    public function validationAttributes(){
        return [
            'name' => __('recipes.attributes.name'),
            'description' => __('recipes.attributes.description'),
            'recipe_category_id' => __('recipes.attributes.recipe_category_id'),
            'image' => __('recipes.attributes.image'),
            'portions' => __('recipes.attributes.portions'),
            'estimated_time' => __('recipes.attributes.estimated_time'),
        ];
    }

    public function mount(Recipe $recipe, Bool $editMode){
        $this->recipe = $recipe;
        $this->imageChange();
        $this->editMode = $editMode;
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function confirmDeleteImage(){
        $this->dialog()->confirm([
            'title' => __('recipes.dialogs.image_delete.title'),
            'description' => __('recipes.dialogs.image_delete.description', [
                'name' => $this->recipe->name,
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
        if (Storage::disk('public')->delete($this->recipe->image)) {
            $this->recipe->image = null;
            $this->recipe->save();
            $this->imageChange();
            $this->notification()->success(
                $title = __('recipes.messages.successes.image_deleted.title'),
                $description = __('recipes.messages.successes.image_deleted.$description', ['name' => $this->ingredient->name]),
            );
            return;
        }
        $this->notification()->error(
            $title = __('recipes.messages.errors.image_deleted.title'),
            $description = __('recipes.messages.errors.image_deleted.$description')
        );
    }

    public function imageChange(){
        $this->imageExists = $this->recipe->imageExists();
        $this->imageURL = $this->recipe->imageURL();
    }

    public function save(){
        if($this->editMode){
            $this->authorize('update', $this->ingredient);
        } else {
            $this->authorize('create', Recipe::class);
        }
        $this->validate();
        
        $recipe = $this->recipe;
        $image = $this->image;
        if ($image !== null) {
            $recipe->image = $recipe->id.'.'.$this->image->getClientOriginalExtension();
        }
        $recipe->save();
        
        if ($image !== null) {
            $this->image->storeAs(
                '',
                $recipe->image,
                'public'
            );
        }

        $this->notification()->success(
            $title = $this->editMode ?
                __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode ?
            __('translation.messages.successes.updated', ['name' => $this->recipe->name])
            : __('translation.messages.successes.stored', ['name' => $this->recipe->name])
        );
        $this->editMode = true;
        $this->imageChange();
    }

    public function render()
    {
        return view('livewire.recipes.recipe-form');
    }
}
