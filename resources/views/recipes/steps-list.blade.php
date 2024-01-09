@props(['recipe_steps' => []])
<h2>{{ __('recipes.steps') }}</h2>
@foreach ($recipe_steps as $step)
  <x-recipes.recipe-step :step="$step" />
@endforeach