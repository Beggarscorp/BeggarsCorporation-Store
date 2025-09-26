<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Products;
use App\Models\Category;

#[Layout('layouts.app')]
class Shop extends Component
{
    public $products;

    public function addProductToCart($productId)
    {
        addToCart($productId, 1);
        $this->dispatch('cartUpdated'); // notify CartCount
    }
    
    public function mount($slug = null)
    {
        if($slug)
        {
            $categoryId = Category::where('slug', $slug)->value('id');
            $this->products = Products::where('category_id', $categoryId)->get();
        }
        else
        {
            $this->products = Products::all();
        }
    }

    public function render()
    {
        return view('livewire.shop', [
            'title' => 'Shop',
        ]);
    }
}
