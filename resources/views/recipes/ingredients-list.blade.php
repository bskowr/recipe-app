@props(['recipe_ingredients' => []])
<h1>{{ __('recipes.ingredients') }}</h1>
@foreach ($recipe_ingredients as $recipe_ingredient)
  <x-recipes.recipe-ingredient :ingredient="$recipe_ingredient->ingredient" :amount_used="$recipe_ingredient->amount_used" />
@endforeach