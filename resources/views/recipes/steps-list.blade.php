@props(['recipe' => ''])
<div class="my-6">
  <h2 class="text-3xl">{{ __('recipes.steps') }}</h2>
  @foreach ($recipe->recipeSteps as $step)
    <x-recipes.recipe-step :step="$step" />
  @endforeach
  <x-wireui-button positive label="{{ __('recipes.steps.actions.create') }}" href="{{ route('recipes.steps.create', ['recipe' => $recipe->id]) }}" class="justify-self-end" />
</div>