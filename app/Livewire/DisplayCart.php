<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DisplayCart extends Component
{
    public $cart;
    public $itemCount;
    public $totalCost = 0;

    protected $listeners = ['updateCart' => 'getCartItems'];

    public function mount()
    {
        $this->getCartItems();
    }

    public function calculateTotalCost()
    {
        $cost = 0;
        foreach($this->cart as $item)
        {
            $cost += ($item['price'] * $item['quantity']);
        }

        return $cost;
    }

    public function getCartItems()
    {
        $this->cart = Session::get('cart', []);
        $this->itemCount = count($this->cart);
        $this->totalCost = $this->calculateTotalCost();
    }

    public function render()
    {
        return view('livewire.display-cart');
    }
}
