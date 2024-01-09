<div class="flex flex-row p-6 my-6 rounded-xl">
    <div class="flex-none w-1/4 p-6"> 
        <img src="{{ $step->imageURL() }}" alt="{{ $step->name }}">
    </div>
    <div class="flex-initial basis-2/3 flex flex-col justify-center p-6">
        <h2>
            {{ $step->step_number }} | {{ $step->name }}
        </h2>
        <div class="flex flex-row text-center items-center">
            <x-dynamic-component component="wireui::icons.outline.clock" style="width: 25px;"/>
            {{ $step->estimated_time }}
        </div>
        <p class="max-w-prose">
            {{ $step->description }}
        </p>
    </div>
</div>