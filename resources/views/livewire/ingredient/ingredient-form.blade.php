<div class="p-2">
    <form wire:submit.prevent="save">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            @if ($editMode)
                {{ __('ingredient.labels.edit_form_title') }}
            @else
                {{ __('ingredient.labels.create_form_title') }}
            @endif
        </h1>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="name">{{ __('ingredient.attributes.name') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredient.name' />
            </div>
            <div class="">
                <label for="description">{{ __('ingredient.attributes.description') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredient.description' />
            </div>
            <div class="">
                <label for="ingredient_category_id">{{ __('ingredient.attributes.ingredient_category_id') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredient.ingredient_category_id' />
            </div>
            <div class="">
                <label for="price">{{ __('ingredient.attributes.price') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredient.price' />
            </div>
            <div class="">
                <label for="owned_amount">{{ __('ingredient.attributes.owned_amount') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredient.owned_amount' />
            </div>
            <div class="">
                <label for="unit">{{ __('ingredient.attributes.unit') }}</label>
            </div>
            <div class="">
                <input placeholder="{{ __('translation.enter') }}" wire:model='ingredient.unit' />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('ingredient.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}" />
            <x-button type="submit" primary label="{{ __('translation.save') }}" spinner />
        </div>
    </form>
</div>
