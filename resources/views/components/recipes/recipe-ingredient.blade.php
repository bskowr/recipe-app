@props([
    'ingredient' => '',
    'amount_used' => 0
])
<div class="flex flex-row px-3 my-3 rounded-xl border-2">
    <div class="flex-none w-1/12 p-3 flex justify-center"> 
        <img src="{{ $ingredient->imageURL() }}" alt="{{ $ingredient->name }}">
    </div>
    <div class="flex-initial basis-2/3 flex flex-col justify-center">
        <div class="flex flex-row text-center">
            <h2 class="w-1/2 text-2xl text-left">
                {{ $ingredient->name }}
            </h2>
        </div>
        <p class="max-w-prose text-xs">
            {{ $ingredient->description }}
        </p>
    </div>
</div>