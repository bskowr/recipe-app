<?php

namespace App\Http\Livewire\Recipes\Steps;


use App\Models\Ingredient;
use App\Models\Recipe;
use Livewire\Component;
use App\Models\RecipeStep;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RecipeStepForm extends Component
{
    use Actions;
    use AuthorizesRequests;
    use WithFileUploads;
    public Recipe $recipe;
    public RecipeStep $step;
    public $ingredientsIds;
    public $image;
    public $imageURL;
    public bool $imageExists;
    public Bool $editMode;

    public function rules(){
        return [
            'step.name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],
            'step.description' => [
                'nullable',
                'string',
                'max:512',
            ],
            'step.step_number' => [
                'required',
                'integer'
            ],
            'image' => [
                'nullable',
                'image',
            ],
            'step.estimated_time' => [
                'required',
            ],
            'ingredientsIds' => [
                'required',
                'array',
            ]
        ];
    }

    public function validationAttributes(){
        return [
            'name' => __('recipes.steps.attributes.name'),
            'description' => __('recipes.steps.attributes.description'),
            'step_number' => __('recipes.steps.attributes.step_number'),
            'image' => __('recipes.steps.attributes.image'),
            'estimated_time' => __('recipes.steps.attributes.estimated_time'),
            'ingredientsIds' => __('recipes.steps.attributes.ingredients'),
        ];
    }

    public function mount(Recipe $recipe, RecipeStep $step, Bool $editMode){
        $this->recipe = $recipe;
        $this->step = $step;
        $this->ingredientsIds = $step->ingredients->toArray();
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
                'name' => $this->step->name,
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
        if (Storage::disk('public')->delete($this->step->image)) {
            $this->step->image = null;
            $this->step->save();
            $this->imageChange();
            $this->notification()->success(
                $title = __('recipes.messages.successes.image_deleted.title'),
                $description = __('recipes.messages.successes.image_deleted.$description', ['name' => $this->step->name]),
            );
            return;
        }
        $this->notification()->error(
            $title = __('recipes.messages.errors.image_deleted.title'),
            $description = __('recipes.messages.errors.image_deleted.$description')
        );
    }

    public function imageChange(){
        $this->imageExists = $this->step->imageExists();
        $this->imageURL = $this->step->imageURL();
    }

    public function save(){
        if($this->editMode){
            $this->authorize('update', $this->recipe);
        } else {
            $this->authorize('create', Recipe::class);
        }
        $this->validate();
        
        $step = $this->step;
        $step->recipe_id = $this->recipe->id;
        $ingredientsIds = $this->ingredientsIds;
        $image = $this->image;
        DB::transaction(function () use ($step, $ingredientsIds, $image) {
            $step->save();
            if ($image !== null) {
                $step->image = $step->id.'.'.$this->image->getClientOriginalExtension();
            }
            $step->save();
            $step->ingredients()->sync($ingredientsIds);
        });       
        
        if ($image !== null) {
            $this->image->storeAs(
                '',
                $step->image,
                'public'
            );
        }

        $this->notification()->success(
            $title = $this->editMode ?
                __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored_title'),
            $description = $this->editMode ?
            __('translation.messages.successes.updated', ['name' => $this->step->name])
            : __('translation.messages.successes.stored', ['name' => $this->step->name])
        );
        return redirect()->to('/recipes'.'/'.$step->recipe->id);
    }

    public function render()
    {
        return view('livewire.recipes.steps.recipe-step-form');
    }
}
