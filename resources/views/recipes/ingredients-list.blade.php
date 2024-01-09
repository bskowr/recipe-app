@props(['recipe_ingredients' => []])
<div class="my-6">
  <h2 class="text-3xl">{{ __('recipes.ingredients') }}</h2>
  @foreach ($recipe_ingredients as $recipe_ingredient)
    <x-recipes.recipe-ingredient :ingredient="$recipe_ingredient->ingredient" :amount_used="$recipe_ingredient->amount_used" />
  @endforeach
</div>