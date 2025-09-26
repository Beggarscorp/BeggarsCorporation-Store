<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CartCount extends Component
{
    public $cartCount = 0;
    protected $listeners = ['cartUpdated' => 'updateCartCount'];
    public function mount()
    {
        $this->updateCartCount();
    }   
    public function updateCartCount()
    {
        $this->cartCount = count(getCartItems());
    }
    public function render()
    {
        return view('livewire.components.cart-count');
    }
}
