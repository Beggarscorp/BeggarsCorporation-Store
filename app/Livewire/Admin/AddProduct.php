<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use App\Models\Products;
use App\Models\Category;
use App\Models\ProductColor;
use Illuminate\Support\Str; 

class AddProduct extends Component
{
    use WithFileUploads;

    // Product fields
    public $product_name;
    public $slug;
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
    public $productGalleryImages = [];

    // Load categories and colors
    public $categories;
    public $colors;

    public function mount()
    {
        $this->categories = Category::all();
        $this->colors = ProductColor::all();
    }

    // Validation rules
    protected $rules = [
        'product_name' => 'required|string|max:255',
        'slug' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'size_and_fit' => 'nullable|string',
        'material_and_care' => 'nullable|string',
        'specification' => 'nullable|string',
        'product_color_id' => 'nullable|exists:product_colors,id',
        'category_id' => 'required|exists:categories,id',
        'impact_product_by' => 'nullable|string|max:255',
        'stock' => 'required|integer|min:0',
        'min_order_quantity' => 'required|integer|min:1',
        'productImage' => 'nullable|image|max:1024', // 1MB max
        'productGalleryImages.*' => 'nullable|image|max:1024',
    ];

    public function generateSlug($value)
    {
        $this->slug = Str::slug($value);
    }

    public function addProduct()
    {
        $this->validate();

        // Handle single image upload
        $imagePath = $this->productImage ? $this->productImage->store('products', 'public') : null;

        // Handle gallery images upload
        $galleryPaths = [];
        if ($this->productGalleryImages) {
            foreach ($this->productGalleryImages as $image) {
                $galleryPaths[] = $image->store('products/gallery', 'public');
            }
        }
        $this->product_color_id=1;

        // Save to database
        Products::create([
            'product_name' => $this->product_name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'size_and_fit' => $this->size_and_fit,
            'material_and_care' => $this->material_and_care,
            'specification' => $this->specification,
            'product_color_id' => $this->product_color_id,
            'category_id' => $this->category_id,
            'impact_product_by' => $this->impact_product_by,
            'stock' => $this->stock,
            'min_order_quantity' => $this->min_order_quantity,
            'productImage' => $imagePath,
            'productGalleryImages' => json_encode($galleryPaths),
        ]);

        session()->flash('message', 'Product added successfully!');
        $this->reset([
            'product_name', 'slug', 'description', 'price', 'size_and_fit',
            'material_and_care', 'specification', 'product_color_id',
            'category_id', 'impact_product_by', 'stock', 'min_order_quantity',
            'productImage', 'productGalleryImages'
        ]);
    }

    #[Layout('layouts.admin')]
    public function render(): mixed
    {
        return view('livewire.admin.add-product', [
            'title' => 'Add Product',
        ]);
    }
}
