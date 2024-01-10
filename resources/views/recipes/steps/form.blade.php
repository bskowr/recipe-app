<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('translation.navigation.recipes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @if (!empty($step))
                    <livewire:recipes.steps.recipe-step-form :recipe="$recipe" :step="$step" :editMode="true" />
                @else
                    <livewire:recipes.steps.recipe-step-form :recipe="$recipe" :editMode="false" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>