@props(['recipe_steps' => []])
<div class="my-6">
  <h2 class="text-3xl">{{ __('recipes.steps') }}</h2>
  @foreach ($recipe_steps as $step)
    <x-recipes.recipe-step :step="$step" />
  @endforeach
</div>