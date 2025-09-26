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

    public function addProductToCart()
    {
        dd("Hello jay");
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.components.indexpage.bestseller');
    }
}
