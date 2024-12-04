<div>
<div x-data="{            
    slides: [                
        {
            imgSrc: 'https://imageproxy.wolt.com/venue/6244602e8b1d8a7188362d50/e7dbcf1c-ea45-11ec-851b-127341d19a33_menu__3___9_.jpg',
            imgAlt: 'Vibrant abstract painting with swirling blue and light pink hues on a canvas.',
            title: '{{ $restaurant->name }}',
            description: '{{ $restaurant->description }}',                    
        },                
  
    ],            
    currentSlideIndex: 1,
    touchStartX: null,
    touchEndX: null,
    swipeThreshold: 50,
    previous() {                
        if (this.currentSlideIndex > 1) {                    
            this.currentSlideIndex = this.currentSlideIndex - 1                
        } else {   
            // If it's the first slide, go to the last slide           
            this.currentSlideIndex = this.slides.length                
        }            
    },            
    next() {                
        if (this.currentSlideIndex < this.slides.length) {                    
            this.currentSlideIndex = this.currentSlideIndex + 1                
        } else {                 
            // If it's the last slide, go to the first slide    
            this.currentSlideIndex = 1                
        }            
    },        
    handleTouchStart(event) {
        this.touchStartX = event.touches[0].clientX
    },
    handleTouchMove(event) {
        this.touchEndX = event.touches[0].clientX
    },
    handleTouchEnd() {
        if(this.touchEndX){
            if (this.touchStartX - this.touchEndX > this.swipeThreshold) {
                this.next()
            }
            if (this.touchStartX - this.touchEndX < -this.swipeThreshold) {
                this.previous()
            }
            this.touchStartX = null
            this.touchEndX = null
        }
    },     
}" class="relative w-full overflow-hidden"> 
    <div class="relative min-h-[50svh] w-full" x-on:touchstart="handleTouchStart($event)" x-on:touchmove="handleTouchMove($event)" x-on:touchend="handleTouchEnd()">
        <template x-for="(slide, index) in slides">
            <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
                <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 bg-gradient-to-t from-neutral-950/85 to-transparent px-16 py-12 text-center">
                    <h3 class="w-full lg:w-[80%] text-balance text-2xl lg:text-3xl font-bold text-white" x-text="slide.title" x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h3>
                    <p class="lg:w-1/2 w-full text-pretty text-sm text-neutral-300" x-text="slide.description" x-bind:id="'slide' + (index + 1) + 'Description'"></p>
                </div>

                <img class="absolute w-full h-full inset-0 object-cover text-neutral-600 dark:text-neutral-300" x-bind:src="slide.imgSrc" x-bind:alt="slide.imgAlt" />
            </div>
        </template>
    </div>
    
</div>

<div class="py-2">
    <div class="max-w-7xl mx-auto">
        <div class="overflow-hidden sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold uppercase mb-4">Hrane</h1>
                <div class="container mx-auto">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
                      @foreach($restaurant->products as $product)
                      <a>
                        <article class="group flex rounded-md flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 transition duration-700 ease-out group-hover:scale-105">
                          <div class="h-34 md:h-44 overflow-hidden">
                            <img src="https://imageproxy.wolt.com/venue/6244602e8b1d8a7188362d50/e7dbcf1c-ea45-11ec-851b-127341d19a33_menu__3___9_.jpg" class="object-cover transition duration-700 ease-out group-hover:scale-105" alt="Restaurant Image" />
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
                                
                                @livewire('cart', ['productId' => $product->id])
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