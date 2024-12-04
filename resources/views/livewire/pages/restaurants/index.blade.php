<div class="container mx-auto">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4">
      @foreach($restaurants as $restaurant)
      <a href="{{ route('restaurant.show', $restaurant->id)}}">
        <article class="group flex rounded-md flex-col overflow-hidden border border-neutral-300 bg-neutral-50 text-neutral-600 transition duration-700 ease-out group-hover:scale-105">
          <div class="h-34 md:h-44 overflow-hidden">
            <img src="https://imageproxy.wolt.com/venue/6244602e8b1d8a7188362d50/e7dbcf1c-ea45-11ec-851b-127341d19a33_menu__3___9_.jpg" class="object-cover transition duration-700 ease-out group-hover:scale-105" alt="Restaurant Image" />
          </div>
          <div class="flex justify-between gap-2 p-4">
            <div class="flex flex-col gap-2">
              <h3 class="text-balance text-base font-bold text-neutral-900" aria-describedby="restaurantDesc">
                {{ \Illuminate\Support\Str::limit($restaurant->name, 30, '...') }}
              </h3>
              <p id="restaurantDesc" class="text-pretty text-sm">
                {{ \Illuminate\Support\Str::limit($restaurant->description, 40, '...') }}
              </p>
            </div>
            <div class="flex flex-col items-center justify-center bg-primary-50 px-2 rounded-md">
              <p class="text-primary-10 text-sm">20-30</p>
              <p class="text-primary-10 text-xs">minuta</p>
            </div>
          </div>
          <div class="w-full h-[0.2px] border border-dashed"></div>
          <div class="flex flex-col gap-4 p-4">
            <div class="flex items-center text-sm gap-2">
              <p>99,00 RSD</p>
              <div class="w-2 h-2 bg-primary-50 rounded-md"></div>
              <p>$$$<span class="text-gray-300">$</span></p>
              <div class="w-2 h-2 bg-primary-50 rounded-md"></div>
              <p>😀 9.6</p>
            </div>
          </div>
        </article>
      </a>
      @endforeach
    </div>
</div>
  