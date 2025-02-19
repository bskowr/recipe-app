@props([
  'image' => '',
  'title' => '',
  'category' => '',
  'description' => '',
  'withBackground' => false,
  'model',
  'actions' => [],
  'hasDefaultAction' => false,
  'selected' => false,
  'price' => '',
  'currency' => 'zł',
  'owned_amount' => '',
  'unit' => '',
])

<div class="{{ $withBackground ? 'rounded-md shadow-md' : '' }}">
  @if ($hasDefaultAction)
    <a href="#!" wire:click.prevent="onCardClick({{ $model->id }})">
      <img src="{{ $image }}" alt="{{ $image }}" class="hover:shadow-lg cursor-pointer rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }} {{ $selected ? variants('gridView.selected') : "" }}">
    </a>
  @else
    <img src="{{ $image }}" alt="{{ $image }}" class="rounded-md h-48 w-full object-cover {{ $withBackground ? 'rounded-b-none' : '' }}  {{ $selected ? variants('gridView.selected') : "" }}">
  @endif

  <div class="pt-4 {{ $withBackground ? 'bg-white rounded-b-md p-4' : '' }}">
    <div class="flex items-start">
      <div class="flex-1">
        <h3 class="font-bold leading-6 text-gray-900">
          @if ($hasDefaultAction)
            <a href="#!" class="hover:underline" wire:click.prevent="onCardClick({{ $model->getKey() }})">
              {!! $title !!}
            </a>
          @else
            {!! $title !!}
          @endif
        </h3>
        @if ($category)
          <span class="text-sm text-gray-600 flex justify-start">
            {!! $category !!}
          </span>
        @endif
        @if ($price)
          <span class="text-sm text-gray-600 flex justify-start">
            {{ __('ingredients.attributes.price') }}: {!! $price !!} {!! $currency !!}
          </span>
        @endif
        @if ($price)
          <span class="text-sm text-gray-600 flex justify-start">
            {{ __('ingredients.attributes.owned_amount') }}: {!! $owned_amount !!} {!! $unit !!}
          </span>
        @endif
      </div>

      @if (count($actions))
        <div class="flex justify-end items-center">
          <x-lv-actions.drop-down :actions="$actions" :model="$model" />
        </div>
      @endif
    </div>

    @if (isset($description))
      <p class="line-clamp-3 mt-2">
        {!! $description !!}
      </p>
    @endif
  </div>

</div>