



<div class="flex flex-row px-3 my-6 rounded-xl border-2">
    <div class="flex-none w-1/4 p-3 flex justify-center"> 
        <img src="{{ $step->imageURL() }}" alt="{{ $step->name }}">
    </div>
    <div class="flex-initial basis-2/3 flex flex-col justify-center p-6">
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
</div>