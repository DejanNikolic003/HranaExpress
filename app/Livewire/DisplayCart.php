<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use TallStackUi\Traits\Interactions; 
use Livewire\Component;

class DisplayCart extends Component
{
    use Interactions;

    public $cart;
    public $itemCount;
    public $totalCost = 0;

    protected $listeners = [
        'updateCart' => 'getCartItems',
        'removeItems' => 'removeAllItem',
    ];

    public function mount()
    {
        $this->getCartItems();
    }

    public function calculateTotalCost(): int
    {
        $cost = 0;
        foreach($this->cart as $item)
        {
            $cost += ($item['price'] * $item['quantity']);
        }

        return $cost;
    }

    public function getCartItems(): void
    {
        $this->cart = Session::get('cart', []);
        $this->itemCount = count($this->cart);
        $this->totalCost = $this->calculateTotalCost();
    }

    public function removeItem(int $productId): void
    {
        $this->cart = Session::get('cart');

        if(!isset($this->cart[$productId])) {
            $this->toast()->error('Proizvod ne postoji!')->send();
            return;
        }
  
        Session::forget('cart');
        unset($this->cart[$productId]);
        Session::put('cart', $this->cart);
        $this->getCartItems();
        $this->toast()->success('Uspešno ste uklonili proizvod!')->send();
    }

    public function removeAllItem(): bool
    {
        if(!isset($this->cart)) {
            return false;
        }

        unset($this->cart);
        Session::forget('cart');
        return true;
    }


    public function render()
    {
        return view('livewire.display-cart');
    }
}
