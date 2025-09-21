<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Products;
use Illuminate\Support\Facades\Storage;

class AllProducts extends Component
{
    use WithPagination;
    public $Index;

    public function updateProduct($id)
    {
        return redirect()
        ->route('admin.update-product',['id'=>$id]);
    }

    public function deleteProduct($id)
    {
        $product=Products::findOrFail($id);

        // delete product feature image
        if($product->productImage && Storage::exists('public/products'.$product->productImage))
        {
            Storage::delete('public/products'.$product->productImage);
        }

        foreach(json_decode($product->productGalleryImages) as $productGalleryimg)
        {
            if($productGalleryimg && Storage::exists('public/gallery'.$productGalleryimg))
            {
                Storage::delete('public/gallery'.$productGalleryimg);
            }
        }

        $product->delete();
        session()->flash('message', 'Product deleted successfully.');
    }

    #[Layout('layouts.admin')]
    public function render(): mixed
    {
        $this->Index=1;
        return view('livewire.admin.all-products', [
            'title' => 'All Products',
            'products'=>Products::latest()->paginate(10)
        ]);
    }
}