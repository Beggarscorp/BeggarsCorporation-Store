<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Products;

class Product extends Component
{
    public $product;
    
    public function mount($id)
    {
        $this->product = Products::findOrFail($id);
    }
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.product',[
            'title' => 'Product Details',
            'product' => $this->product
        ]);
    }
}
