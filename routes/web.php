<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\Restaurants\Show;
use App\Livewire\Pages\Restaurants\Show as RestaurantsShow;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function() {
    Route::view(uri: '/home', view: 'home')->name('home');
    Route::view(uri: '/profile', view: 'profile')->name('profile');

    Route::get('/restaurant/{id}', RestaurantsShow::class)->name('restaurant.show');
});    


require __DIR__.'/auth.php';
