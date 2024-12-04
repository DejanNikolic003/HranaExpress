<div>
    <x-primary-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'open-cart')">
        {{ __('Korpa') }} ({{ $itemCount }})
    </x-primary-button>
    <x-amodal name="open-cart" focusable title='Korpa'>
        @if(count($cart) > 0)
            @foreach($cart as $items)
                <div class="p-3 flex items-center gap-2">
                    <div class="h-14 max-w-[100px] overflow-hidden rounded-md">
                        <img src="https://imageproxy.wolt.com/venue/6244602e8b1d8a7188362d50/e7dbcf1c-ea45-11ec-851b-127341d19a33_menu__3___9_.jpg" class="object-cover transition duration-700 ease-out group-hover:scale-105" alt="Restaurant Image" />
                    </div>
                    <div class="w-full flex justify-between items-center">
                        <div class="flex flex-col items-start justify-center text-left">
                            <p>{{ $items['name'] }}</p>
                            <p class="text-xs text-gray-400 text-left">Količina: {{ $items['quantity'] }}</p>
                        </div>
                        <div>
                            <p class="font-medium">{{ ($items['price'] * $items['quantity']) }} <span class="text-primary text-base">RSD</span></p>
                        </div>
                    </div>
                </div>
                @if(!$loop->last)
                    <div class="w-full h-[0.2px] border border-dashed"></div>
                @endif
            @endforeach
        @endif
        <hr class="my-2 h-0.5 border-t-0 bg-gray-100 mt-2" />
        <div class="flex items-center justify-end gap-2">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Zatvori') }}
            </x-secondary-button>
            <x-primary-button wire:click="store()" class="flex items-center gap-2">
                {{ __('Idi na plaćanje') }}
                <div class="rounded-lg bg-white px-2 py-0.5">
                    <span class="text-primary">{{ $totalCost }}</span>
                </div>
            </x-primary-button>
        </div>
    </x-amodal>
</div>
