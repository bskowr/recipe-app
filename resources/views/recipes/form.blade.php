<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('translation.navigation.recipes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @if (isset($recipe))
                    <livewire:recipes.recipe-form :recipe="$recipe" :editMode="true" />
                @else
                    <livewire:recipes.recipe-form :editMode="false" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>