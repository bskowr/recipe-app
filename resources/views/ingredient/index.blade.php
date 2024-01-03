<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('translation.navigation.ingredient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="table-view-wrapper bg-white shadow-xl sm:rounded-lg">
                @can('create', App\Models\Ingredient::class)
                    <div class="grid justify-items-strech pr-2 pt-2">
                        <x-button primary label="{{ __('ingredient.actions.create') }}" href="{{ route('ingredient.create') }}" class="justify-self-end" />
                    </div>
                @endcan
                <livewire:ingredient.ingredient-grid-view />
            </div>
        </div>
    </div>
</x-app-layout>