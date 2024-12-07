<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\Restaurants\Show;
use App\Livewire\Pages\Restaurants\Show as RestaurantsShow;
use App\Livewire\Pages\Orders\Index as OrderIndex;
Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function() {
    Route::view(uri: '/home', view: 'home')->name('home');
    Route::view(uri: '/profile', view: 'profile')->name('profile');

    Route::get('/restaurant/{id}', RestaurantsShow::class)->name('restaurant.show');
    Route::get('/orders', OrderIndex::class)->name('orders.index');
});    


require __DIR__.'/auth.php';
