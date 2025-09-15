<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateCategory extends Component
{
    use WithFileUploads;

    public $category;
    public $categories;

    public $UpdateCategoryName;
    public $UpdateSlug;
    public $UpdateCategoryParetId;
    public $UpdateCategoryImage;

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);

        $this->UpdateCategoryName = $this->category->categoryName;
        $this->UpdateCategoryParetId = $this->category->parent_id;
        $this->UpdateSlug = $this->category->slug;

        $this->categories = Category::all();
    }

    public function rules()
    {
        return [
            'UpdateCategoryName' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'categoryName')->ignore($this->category->id),
            ],
            'UpdateCategoryParetId' => 'nullable|integer|min:0',
            'UpdateCategoryImage' => 'nullable|image|max:1024', // optional on update
        ];
    }

    public function updateCategory()
    {
        try {
            $this->validate();

            $this->UpdateSlug = Str::slug($this->UpdateCategoryName, '-');

            // If new image uploaded, replace old one
            if ($this->UpdateCategoryImage) {
                $path = $this->UpdateCategoryImage->store('categoryImages', 'public');
            } else {
                $path = $this->category->image; // keep old image
            }

            // Update existing category instead of creating new one
            $this->category->update([
                'categoryName' => $this->UpdateCategoryName,
                'slug' => $this->UpdateSlug,
                'image' => $path,
                'parent_id' => $this->UpdateCategoryParetId,
            ]);

            session()->flash('message', 'Category updated successfully ✅');
        } catch (\Throwable $e) {
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }

    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.categories', [
            'title' => 'Update Category',
        ]);
    }
}
