<div class="p-2">
    <form wire:submit.prevent="save">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($editMode)
                {{ __('ingredients.labels.edit_form_title') }}
            @else
                {{ __('ingredients.labels.create_form_title') }}
            @endif
        </h1>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('ingredients.attributes.name') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredients.name' />
            </div>
            <div class="">
                <label for="description">{{ __('ingredients.attributes.description') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredients.description' />
            </div>
            <div class="">
                <label for="ingredient_category_id">{{ __('ingredients.attributes.ingredient_category_id') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredients.ingredient_category_id' />
            </div>
            <div class="">
                <label for="price">{{ __('ingredients.attributes.price') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredients.price' />
            </div>
            <div class="">
                <label for="owned_amount">{{ __('ingredients.attributes.owned_amount') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredients.owned_amount' />
            </div>
            <div class="">
                <label for="unit">{{ __('ingredients.attributes.unit') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredients.unit' />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('ingredients.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}" />
            <x-button type="submit" primary label="{{ __('translation.save') }}" spinner />
        </div>
    </form>
</div>
