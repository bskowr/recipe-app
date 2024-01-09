<?php

namespace App\Http\Livewire\Recipes;


use App\Models\Recipe;
use Livewire\Component;
use App\Models\RecipeStep;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecipeStepsForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    use WithFileUploads;
    public Recipe $recipe;
    public RecipeStep $recipeStep;
    public $image;
    public $imageURL;
    public bool $imageExists;
    public Bool $editMode;

    public function rules(){
        return [
            'recipeStep.name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'recipeStep.description' => [
                'nullable',
                'string',
                'max:512',
            ],
            'recipeStep.step_number' => [
                'required',
                'integer'
            ],
            'image' => [
                'nullable',
                'image',
            ],
            'recipeStep.estimated_time' => []
        ];
    }

    public function validationAttributes(){
        return [
            'name' => __('recipes.steps.attributes.name'),
            'description' => __('recipes.steps.attributes.description'),
            'step_number' => __('recipes.steps.attributes.step_number'),
            'image' => __('recipes.steps.attributes.image'),
            'estimated_time' => __('recipes.steps.attributes.estimated_time'),
        ];
    }

    public function mount(Recipe $recipe, RecipeStep $recipeStep, Bool $editMode){
        $this->recipe = $recipe;
        $this->recipeStep = $recipeStep;
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
                'name' => $this->recipeStep->name,
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
        if (Storage::disk('public')->delete($this->recipeStep->image)) {
            $this->recipeStep->image = null;
            $this->recipeStep->save();
            $this->imageChange();
            $this->notification()->success(
                $title = __('recipes.messages.successes.image_deleted.title'),
                $description = __('recipes.messages.successes.image_deleted.$description', ['name' => $this->recipeStep->name]),
            );
            return;
        }
        $this->notification()->error(
            $title = __('recipes.messages.errors.image_deleted.title'),
            $description = __('recipes.messages.errors.image_deleted.$description')
        );
    }

    public function imageChange(){
        $this->imageExists = $this->recipeStep->imageExists();
        $this->imageURL = $this->recipeStep->imageURL();
    }

    public function save(){
        if($this->editMode){
            $this->authorize('update', $this->recipe);
        } else {
            $this->authorize('create', Recipe::class);
        }
        $this->validate();
        
        $recipeStep = $this->recipeStep;
        $recipeStep->recipe_id = $this->recipe->id;
        $image = $this->image;
        if ($image !== null) {
            $recipeStep->image = $recipeStep->id.'.'.$this->image->getClientOriginalExtension();
        }
        $recipeStep->save();
        
        if ($image !== null) {
            $this->image->storeAs(
                '',
                $recipeStep->image,
                'public'
            );
        }

        $this->notification()->success(
            $title = $this->editMode ?
                __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode ?
            __('translation.messages.successes.updated', ['name' => $this->recipeStep->name])
            : __('translation.messages.successes.stored', ['name' => $this->recipeStep->name])
        );
        return redirect()->to('/recipes'.'/'.$recipeStep->recipe->id);
    }

    public function render()
    {
        return view('livewire.recipes.recipe-steps-form');
    }
}
