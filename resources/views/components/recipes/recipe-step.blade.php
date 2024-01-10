<div class="rounded-xl border-2 my-6 px-3">
    <div class="flex flex-row">
        <div class="flex-none w-1/4 p-3 flex justify-center"> 
            <img src="{{ $step->imageURL() }}" alt="{{ $step->name }}">
        </div>
        <div class="grow basis-2/3 flex flex-col justify-center p-6">
            <h2 class="text-2xl py-3">
                {{ $step->step_number }}. {{ $step->name }}
            </h2>
            <div class="flex flex-row text-center items-center text-xl py-3">
                <x-dynamic-component component="wireui::icons.outline.clock" style="width: 25px;"/>
                {{ $step->estimated_time }}
            </div>
            <p class="max-w-prose py-3">
                {{ $step->description }}
            </p>
        </div>        
        <x-lv-actions :actions="$actions" :model="$step" />
    </div>
    <div>
        @if ($step->ingredients->count())
            <h3 class="text-xl py-3">{{ __('recipe.steps.ingredients') }}</h3>
        @endif
        @foreach ($step->ingredients as $ingredient)
            <x-recipes.recipe-ingredient :ingredient="$ingredient" />
        @endforeach
    </div>
</div>