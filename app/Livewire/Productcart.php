<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Productcart extends Component
{


    public $cartItems = [];
    public $total = 0;
    public $cartCount = 0;

    public function mount()
    {
        $this->cartItems = getCartItems();
        $this->total = cartTotal();
        $this->cartCount = count($this->cartItems);
    }


    public function increaseCartQuantity($productId)
    {
        increaseCartQuantity($productId);
        $this->cartItems = getCartItems();
        $this->total = cartTotal();
        $this->cartCount = count($this->cartItems);
    }

    public function decreaseCartQuantity($productId)
    {
        decreaseCartQuantity($productId);
        $this->cartItems = getCartItems();
        $this->total = cartTotal();
        $this->cartCount = count($this->cartItems);
    }
    
    public function cartTotal()
    {
        $this->total = cartTotal();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.productcart');
    }
}
