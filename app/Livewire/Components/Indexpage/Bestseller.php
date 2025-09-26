<?php

namespace App\Livewire\Components\Indexpage;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Products;

class Bestseller extends Component
{
    public $products;
    public function mount()
    {
        $this->products = Products::all();
    }

    public function addProductToCart($productId)
    {
        addToCart($productId, 1);
        $this->dispatch('cartUpdated'); // notify CartCount
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.components.indexpage.bestseller');
    }
}
