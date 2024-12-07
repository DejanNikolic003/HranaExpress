<div>
<div class="relative w-full overflow-hidden"> 
    <div class="relative min-h-[50svh] w-full">
        <div  class="absolute inset-0">
            <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-neutral-950/85 to-transparent px-16 py-12 text-center">
                <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white">{{ $restaurant->name }}</h3>
                <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300">{{ $restaurant->description }}</p>
            </div>

            <img class="absolute w-full h-full inset-0 object-cover text-neutral-600" src="https://media.ilovezrenjanin.com/2017/12/Walter-food-12.jpg" />
        </div>
    </div>
</div>

<div class="py-2">
    <div class="max-w-7xl mx-auto">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold uppercase mb-4">Hrane </h1>

                <div class="container mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                      @foreach($restaurant->products as $product)
                      <a>
                        <article class="min-h-[10rem] group flex rounded-md flex-col justify-between overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 transition duration-700 ease-out hover:scale-105">
                          <div class="h-34 md:h-44 overflow-hidden">
                            <img src="https://imageproxy.wolt.com/venue/6244602e8b1d8a7188362d50/e7dbcf1c-ea45-11ec-851b-127341d19a33_menu__3___9_.jpg" class="object-cover transition duration-700 ease-out" alt="Restaurant Image" />
                          </div>
                            <div class="flex justify-between gap-2 p-4">
                                <div class="flex flex-col gap-2">
                                <h3 class="text-balance text-base font-bold text-neutral-900" aria-describedby="restaurantDesc">
                                    {{ $product->name }}
                                </h3>
                                <p id="restaurantDesc" class="text-pretty text-sm">
                                    {{ \Illuminate\Support\Str::limit($product->description, 400, '...') }}
                                </p>
                                </div>
                            </div>
                            <div class="w-full h-[0.2px] border border-dashed"></div>
                            <div class="flex flex-col gap-4 p-4">
                                <div class="flex items-center justify-between text-sm gap-2">
                                <p>{{ $product->total_price }} <span class="text-base text-primary font-bold">RSD</span></p>
                                
                                @livewire('add-to-cart', ['productId' => $product->id])
                                </div>
                            </div>
                        </article>
                      </a>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>