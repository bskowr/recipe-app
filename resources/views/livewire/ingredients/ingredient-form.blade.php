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
                <label for="ingredient_category_id">{{ __('ingredients.attributes.ingredient_category_id') }}</label>
            </div>
            <div class="">
                <x-wireui-select placeholder="{{ __('translation.enter') }}" wire:model_defer='ingredient.ingredient_category_id' 
                    :async_data="route('ingredient_categories.async')" option-label="name" option-value="id" />
            </div>
            <div class="">
                <label for="name">{{ __('ingredients.attributes.name') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model='ingredient.name' />
            </div>
            <div class="">
                <label for="description">{{ __('ingredients.attributes.description') }}</label>
            </div>
            <div class="">
                <x-wireui-textarea placeholder="{{ __('translation.enter') }}" wire:model='ingredient.description' />
            </div>
        </div>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="image">{{ __('ingredients.attributes.image') }}</label>
            </div>
            <div class="">
                @if ($imageExists)
                    <div class="relative">
                        <img class="w-full" src="{{  $imageURL }}" alt="{{ $ingredient->name }}">
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
        <div class="grid grid-cols-2 gap-2">
            <div class="">
                <label for="price">{{ __('ingredients.attributes.price') }}</label>
            </div>
            <div class="">
                <x-wireui-inputs.currency thousands=" " precision="2" placeholder="{{ __('translation.enter') }}" wire:model='ingredient.price' />
            </div>
            <div class="">
                <label for="owned_amount">{{ __('ingredients.attributes.owned_amount') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model='ingredient.owned_amount' />
            </div>
            <div class="">
                <label for="unit">{{ __('ingredients.attributes.unit') }}</label>
            </div>
            <div class="">
                <x-wireui-input placeholder="{{ __('translation.enter') }}" wire:model='ingredient.unit' />
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-wireui-button href="{{ route('ingredients.index') }}" secondary class="mr-2" label="{{ __('translation.back') }}" />
            <x-wireui-button type="submit" primary label="{{ __('translation.save') }}" spinner />
        </div>
    </form>
</div>
