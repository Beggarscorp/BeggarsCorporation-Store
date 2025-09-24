<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Products;

#[Layout('layouts.app')]
class Shop extends Component
{
    public function addProductToCart($productId)
    {
        addToCart($productId, 1);
        // $this->emit('cartUpdated'); // optional for UI refresh
    }

    public function render()
    {
        return view('livewire.shop', [
            'title' => 'Shop',
            'products' => Products::all(),
        ]);
    }
}
