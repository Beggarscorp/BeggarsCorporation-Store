<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function deleteCategory($id)
    {
        // Find the category
        $category = Category::findOrFail($id);

        // Delete the image from storage
        if ($category->categoryImage && Storage::exists('public/categoryImage/' . $category->categoryImage)) {
            Storage::delete('public/categoryImage/' . $category->categoryImage);
        }

        // Delete the category from database
        $category->delete();

        $this->categories = Category::all();

        // Optional: emit event or flash message
        session()->flash('message', 'Category deleted successfully.');
    }

    public function updateCategory($id)
    {
        return redirect()->route('admin.update-category',['id'=>$id]);
    }

    #[Layout('layouts.admin')]
    public function render(): mixed
    {
        return view('livewire.admin.categories', [
            'title' => 'Categories',
        ]);
    }
}

