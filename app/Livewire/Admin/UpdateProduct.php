<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\ProductColor;
use App\Models\Category;
use App\Models\Products;
use Livewire\WithFileUploads;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class UpdateProduct extends Component
{
    use WithFileUploads;

    public $product;
    public $product_name;
    public $description;
    public $price;
    public $size_and_fit;
    public $material_and_care;
    public $specification;
    public $product_color_id;
    public $category_id;
    public $impact_product_by;
    public $stock;
    public $min_order_quantity;
    public $productImage;

    // 🔹 Old gallery + new uploads
    public $productGalleryImages = [];
    public $newGalleryImages = [];

    public $colors;
    public $categories;

    public function mount(Products $id)
    {
        $this->colors = ProductColor::all();
        $this->categories = Category::all();
        $this->product = $id;

        $this->product_name       = $id->product_name;
        $this->description        = $id->description;
        $this->price              = $id->price;
        $this->size_and_fit       = $id->size_and_fit;
        $this->material_and_care  = $id->material_and_care;
        $this->specification      = $id->specification;
        $this->product_color_id   = $id->product_color_id;
        $this->category_id        = $id->category_id;
        $this->impact_product_by  = $id->impact_product_by;
        $this->stock              = $id->stock;
        $this->min_order_quantity = $id->min_order_quantity;
        $this->productImage       = $id->productImage;

        // decode JSON string from DB into array
        $this->productGalleryImages = $id->productGalleryImages
            ? json_decode($id->productGalleryImages, true)
            : [];
    }

    protected function rules()
    {
        return [
            'product_name'        => 'required|string|max:255',
            'description'         => 'nullable|string',
            'price'               => 'required|numeric|min:0',
            'size_and_fit'        => 'nullable|string',
            'material_and_care'   => 'nullable|string',
            'specification'       => 'nullable|string',
            'product_color_id'    => 'nullable|exists:product_colors,id',
            'category_id'         => 'required|exists:categories,id',
            'impact_product_by'   => 'nullable|string|max:255',
            'stock'               => 'required|integer|min:0',
            'min_order_quantity'  => 'required|integer|min:1',

            // ✅ Handle product image
            'productImage' => $this->productImage instanceof TemporaryUploadedFile
                ? 'nullable|image|max:1024'
                : 'nullable|string',

            // ✅ Validate multiple uploads
            'newGalleryImages.*' => 'nullable|image|max:1024',
        ];
    }

    public function updateProduct()
    {
        try {
            $validated = $this->validate();

            // 🔹 Handle main product image
            if ($this->productImage instanceof TemporaryUploadedFile) {
                $validated['productImage'] = $this->productImage->store('products', 'public');
            } else {
                $validated['productImage'] = $this->productImage; // keep old one
            }

            // 🔹 Always ensure array
            $galleryPaths = is_array($this->productGalleryImages) ? $this->productGalleryImages : [];

            // 🔹 Handle new gallery uploads
            if (!empty($this->newGalleryImages)) {
                foreach ($this->newGalleryImages as $img) {
                    if ($img instanceof TemporaryUploadedFile) {
                        $galleryPaths[] = $img->store('products/gallery', 'public');
                    }
                }
            }

            $validated['productGalleryImages'] = json_encode($galleryPaths);

            // 🔹 Update product
            $this->product->update($validated);

            return redirect()
                ->route('admin.allproducts')
                ->with('message', 'Product updated successfully ✅');

        } catch (\Throwable $e) {
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.update-product', [
            'title' => 'Update Product'
        ]);
    }
}
