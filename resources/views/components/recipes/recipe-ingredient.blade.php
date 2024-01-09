@props([
    'ingredient' => '',
    'amount_used' => 0
])
<div class="flex flex-row p-3 rounded-xl border-2 bg-100">
    <div class="flex-none w-1/12 p-3 flex justify-center"> 
        <img src="{{ $ingredient->imageURL() }}" alt="{{ $ingredient->name }}">
    </div>
    <div class="flex-initial basis-2/3 flex flex-col justify-center">
        <div class="flex flex-row text-center">
            <h2>
                {{ $ingredient->name }}
            </h2>
            <x-dynamic-component component="wireui::icons.outline.scale" style="width: 25px;"/>
            {{ $amount_used }} {{ $ingredient->unit }}
        </div>
        <p class="max-w-prose text-xs">
            {{ $ingredient->description }}
        </p>
    </div>
</div>