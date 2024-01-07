<div class="p-2">
    <form wire:submit.prevent="save">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($editMode)
                {{ __('recipes.labels.edit_form_title') }}
            @else
                {{ __('recipes.labels.create_form_title') }}
            @endif
        </h1>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="recipe_category_id">{{ __('recipes.attributes.recipe_category_id') }}</label>
            </div>
            <div class="">
                <x-wireui-select placeholder="{{ __('translation.enter') }}" wire:model_defer='recipe.recipe_category_id' 
                    :async_data="route('recipe_categories.async')" option-label="name" option-value="id" />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('recipes.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}" />
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner />
        </div>
    </form>
</div>
