<div class="p-2">
    <form wire:submit.prevent="save">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($editMode)
                {{ __('recipe_categories.labels.edit_form_title') }}
            @else
                {{ __('recipe_categories.labels.create_form_title') }}
            @endif
        </h1>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('recipe_categories.attributes.name') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='recipeCategory.name' />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('recipe_categories.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}" />
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner />
        </div>
    </form>
</div>
