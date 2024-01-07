@props([
    'name' => '',
    'description' => '',
    'category' => '',
    'image' => '',
    'portions' => '',
    'estimated_time' => '',
])
<img class="w-full" src="{{ $image }}" alt="{{ $name }}">
<h2>{{ __('recipes.details') }}</h2>
<ul>
    <li class="px-4 py-5 border-b border-gray-200 sm:flex sm:items-center">
        <div class="text-xs leading-4 font-semibold uppercase tracking-wider text-gray-900 sm:w-3/12">
            {{ __('recipes.attributes.name') }}
        </div>
        <div class="mt-1 text-sm leading-5 sm:mt-0 sm:w-9/12">
            {{ $name }}
        </div>
    </li>
    <li class="px-4 py-5 border-b border-gray-200 sm:flex sm:items-center">
        <div class="text-xs leading-4 font-semibold uppercase tracking-wider text-gray-900 sm:w-3/12">
            {{ __('recipes.attributes.description') }}
        </div>
        <div class="mt-1 text-sm leading-5 sm:mt-0 sm:w-9/12">
            {{ $description }}
        </div>
    </li>
    <li class="px-4 py-5 border-b border-gray-200 sm:flex sm:items-center">
        <div class="text-xs leading-4 font-semibold uppercase tracking-wider text-gray-900 sm:w-3/12">
            {{ __('recipes.attributes.recipe_category_id') }}
        </div>
        <div class="mt-1 text-sm leading-5 sm:mt-0 sm:w-9/12">
            {{ $category }}
        </div>
    </li>
    <li class="px-4 py-5 border-b border-gray-200 sm:flex sm:items-center">
        <div class="text-xs leading-4 font-semibold uppercase tracking-wider text-gray-900 sm:w-3/12">
            {{ __('recipes.attributes.portions') }}
        </div>
        <div class="mt-1 text-sm leading-5 sm:mt-0 sm:w-9/12">
            {{ $portions }}
        </div>
    </li>
    <li class="px-4 py-5 border-b border-gray-200 sm:flex sm:items-center">
        <div class="text-xs leading-4 font-semibold uppercase tracking-wider text-gray-900 sm:w-3/12">
            {{ __('recipes.attributes.estimated_time') }}
        </div>
        <div class="mt-1 text-sm leading-5 sm:mt-0 sm:w-9/12">
            {{ $estimated_time }}
        </div>
    </li>
</ul>