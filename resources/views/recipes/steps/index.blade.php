<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('translation.navigation.recipes_steps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="table-view-wrapper bg-white shadow-xl sm:rounded-lg">
                @can('create', App\Models\RecipeStep::class)
                    <div class="grid justify-items-strech pr-2 pt-2">
                        <x-wireui-button primary label="{{ __('recipes.actions.create') }}" href="{{ route('recipes.create') }}" class="justify-self-end" />
                    </div>
                @endcan
                {{ $recipeSteps }}
            </div>
        </div>
    </div>
</x-app-layout>