@props(['recipe_steps' => []])
<h2>{{ __('recipes.steps') }}</h2>
<ul>
  @foreach ($recipe_steps as $step)
    <li class="px-4 py-5 border-b border-gray-200 sm:flex sm:items-center">
      <div class="text-xs leading-4 font-semibold uppercase tracking-wider text-gray-900 sm:w-3/12">
        {!! $step->name !!}
      </div>
      <div class="mt-1 text-sm leading-5 sm:mt-0 sm:w-9/12">
        {!! $step->description !!}
      </div>
    </li>
  @endforeach
</ul>