@props(['recipe_ingredients' => []])
<h1>{{ __('recipes.ingredients') }}</h1>
<ul>
  @foreach ($recipe_ingredients as $ingredient)
    <li class="px-4 py-5 border-b border-gray-200 sm:flex sm:items-center">
      <div class="text-xs leading-4 font-semibold uppercase tracking-wider text-gray-900 sm:w-3/12">
        {!! $ingredient !!}
      </div>
      <div class="mt-1 text-sm leading-5 sm:mt-0 sm:w-9/12">
        {!! $ingredient !!}
      </div>
    </li>
  @endforeach
</ul>