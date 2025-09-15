<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use App\Models\Category;
use Illuminate\Support\Str;

class AddCategories extends Component
{
    use WithFileUploads;

    public $categoryName;
    public $parentId;
    public $categoryImage;
    public $categories;
    public $slug;

    //generate categoryName slug
    
    
    protected $rules = [
        'categoryName' => 'required|string|unique:categories,categoryName|max:255',
        'parentId' => 'nullable|integer|min:0',
        'categoryImage'=> 'required|image|max:1024'
    ];
    
    public function mount() {
        $this->categories = Category::all();
    }
    
    public function addCategory()
    {
        try {
            $this->validate();
            $this->slug = Str::slug($this->categoryName,'-');

            $path = $this->categoryImage
                ? $this->categoryImage->store('categoryImages', 'public')
                : null;

            Category::create([
                'categoryName' => $this->categoryName, // ✅ must be included
                'slug' => $this->slug,
                'image' => $path,
                'parent_id' => $this->parentId ? : null,
            ]);

            session()->flash('message', 'Category uploaded successfully');
            $this->reset(['categoryName', 'slug', 'parentId', 'categoryImage']);
        } catch (\Throwable $e) {
            // Show error in browser (for debugging only)
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.add-categories',[
            'title' => 'Add Categories',
        ]);
    }
}
