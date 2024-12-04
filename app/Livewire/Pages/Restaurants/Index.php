<?php

namespace App\Livewire\Pages\Restaurants;

use Livewire\Component;
use App\Models\Restaurant;

class Index extends Component
{
    public function render()
    {
        $restaurants = Restaurant::all();
        return view('livewire.pages.restaurants.index', compact('restaurants'));
    }
}
