@props([
    'step' => '',
    'actions' => [],
])
<x-recipes.recipe-step :step="$step" :actions="$actions" />