<?php

namespace App\Livewire\Pages\Restaurants;

use App\Models\Restaurant;
use Livewire\Component;

class Show extends Component
{
    public $id;

    public function mount(int $id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $restaurant = Restaurant::with('products')->find($this->id);
        return view('livewire.pages.restaurants.show', compact('restaurant'))
                   ->layout('layouts.app');
    }
}
