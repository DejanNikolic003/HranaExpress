<div>
    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'open-cart')">
        {{ __('Korpa') }} @if($itemCount > 0) ({{ $itemCount }}) @endif
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
                        <div class="flex flex-col items-end">
                            <p class="font-medium">{{ ($items['price'] * $items['quantity']) }} <span class="text-primary text-base">RSD</span></p>
                            <x-secondary-button  wire:click="removeItem({{ $items['productId']}})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 bg-white" fill="currentColor" stroke="currentColor" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
                            </x-secondary-button>
                        </div>
                    </div>
                </div>
                @if(!$loop->last)
                    <div class="w-full h-[0.2px] border border-dashed"></div>
                @endif
            @endforeach
        @else 
            <div class="p-3 flex-col w-full justify-center items-center">
                <p class="text-neutral-400 text-lg text-center">Vaša korpa je prazna.</p>
            </div>
        @endif
        <hr class="my-2 h-0.5 border-t-0 bg-gray-100 mt-2" />
        <div class="flex items-center justify-between">
            <div>
                <span class="text-sm">Vaš račun iznosi <span class="text-primary font-medium">{{ $totalCost }} RSD</span></span>
            </div>
            <div class="flex items-center justify-end gap-2">
                <x-secondary-button x-on:click="$dispatch('close')"> {{ __('Zatvori') }}</x-secondary-button>
                @livewire('orders.store-order')
            </div>
        </div>
    </x-amodal>
</div>
