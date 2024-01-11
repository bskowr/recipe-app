<div class="p-2">
    <form wire:submit.prevent="save">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($editMode)
                {{ __('recipe_steps.labels.edit_form_title') }}
            @else
                {{ __('recipe_steps.labels.create_form_title') }}
            @endif
        </h1>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="step_number">{{ __('recipe_steps.attributes.step_number') }}</label>
            </div>
            <div class="">
                <x-wireui-inputs.number placeholder="1" wire:model='step.step_number' wire:dirty.class="border-yellow" />
            </div>
            <div class="">
                <label for="name">{{ __('recipe_steps.attributes.name') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model='step.name' wire:dirty.class="border-yellow" />
            </div>
            <div class="">
                <label for="description">{{ __('recipe_steps.attributes.description') }}</label>
            </div>
            <div class="">
                <x-wireui-textarea placeholder="{{ __('translation.enter') }}" wire:model='step.description' wire:dirty.class="border-yellow" />
            </div>
            <div class="">
                <label for="estimated_time">{{ __('recipe_steps.attributes.estimated_time') }}</label>
            </div>
            <div class="">
                <x-wireui-time-picker placeholder="00:00" format="24" wire:model='step.estimated_time' wire:dirty.class="border-yellow" />
            </div>
        </div> 
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="ingredients">{{ __('recipe_steps.attributes.ingredients') }}</label>
            </div>
            <div class="">
                <x-wireui-select multiselect format="24" wire:model='ingredientsIds' wire:dirty.class="border-yellow"
                    :async-data="route('ingredients.async')" option-label="name" option-value="id" />
            </div>
        </div> 
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="image">{{ __('recipe_steps.attributes.image') }}</label>
            </div>
            <div class="">
                @if ($imageExists)
                    <div class="relative">
                        <img class="w-full" src="{{ $imageURL }}" alt="{{ $step->name }}">
                        <div class="absolute right-2 top-2 h-16">
                            <x-wireui-button.circle outline xs secondary icon="trash" wire:click="confirmDeleteImage" />
                        </div>
                    </div>    
                @else
                    <x-wireui-input type="file" wire:model="image" />
                @endif
            </div>
        </div> 
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('recipes.steps.index', ['recipe' => $recipe]) }}" secondary class="mr-2" label="{{ __('translation.back') }}" />
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner />
        </div>
    </form>
</div>
