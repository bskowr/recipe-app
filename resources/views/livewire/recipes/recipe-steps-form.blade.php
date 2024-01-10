<div class="p-2">
    <form wire:submit.prevent="save">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($editMode)
                {{ __('recipes.steps.labels.edit_form_title') }}
            @else
                {{ __('recipes.steps.labels.create_form_title') }}
            @endif
        </h1>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="step_number">{{ __('recipes.steps.attributes.step_number') }}</label>
            </div>
            <div class="">
                <x-wireui-inputs.number placeholder="1" wire:model='recipeStep.step_number' />
            </div>
            <div class="">
                <label for="name">{{ __('recipes.steps.attributes.name') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model='recipeStep.name' />
            </div>
            <div class="">
                <label for="description">{{ __('recipes.steps.attributes.description') }}</label>
            </div>
            <div class="">
                <x-wireui-textarea placeholder="{{ __('translation.enter') }}" wire:model='recipeStep.description' />
            </div>
            <div class="">
                <label for="estimated_time">{{ __('recipes.steps.attributes.estimated_time') }}</label>
            </div>
            <div class="">
                <x-wireui-time-picker placeholder="00:00" format="24" wire:model='recipeStep.estimated_time' />
            </div>
        </div> 
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="image">{{ __('recipes.steps.attributes.image') }}</label>
            </div>
            <div class="">
                @if ($imageExists)
                    <div class="relative">
                        <img class="w-full" src="{{ $imageURL }}" alt="{{ $recipeStep->name }}">
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
            <x-wireui-button href="{{ route('recipes.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}" />
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner />
        </div>
    </form>
</div>
