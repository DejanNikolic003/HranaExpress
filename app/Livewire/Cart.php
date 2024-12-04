<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use TallStackUi\Traits\Interactions; 
use App\Models\Product;

class Cart extends Component
{
    use Interactions; 

    public $cart = [];
    public $productId;
    public $quantity = 1;

    protected $listeners = ['removeFromCart', 'removeFromCart'];

    public function mount(int $productId)
    {
       $this->productId = $productId;
       $this->cart = Session::get('cart', []);
    }

    public function addToCart()
    {
        $product = Product::find($this->productId);
        
        if(!$product) {
            $this->toast()->error('Proizvod ne postoji!')->send(); 
        }
        
        if(!isset($this->cart[$product->id])) 
        {
            $this->cart[$product->id] = [
                'productId' => $product->id,
                'name' => $product->name,
                'price' => $product->total_price,
                'quantity' => $this->quantity,
            ];
        }
        $this->cart[$product->id]['quantity'] += $this->quantity;

        Session::put('cart', $this->cart);
        $this->dispatch('updateCart');
        $this->toast()->success('Uspešno ste dodali proizvod u korpu!')->send();
    }

    public function removeFromCart(int $productId)
    {
        if(!isset($this->cart[$productId])) {
            $this->toast()->error('Proizvod ne postoji!')->send(); 
        }
        
        unset($this->cart[$productId]);
        Session::put('cart', $this->cart);
        $this->dispatch('updateCart');

    }

    public function render()
    {
        return view('livewire.cart');
    }
}
