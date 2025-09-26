<?php

namespace App\Livewire\Components\Indexpage;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;

class Categories extends Component
{
    public $categories;
    public function mount()
    {
        $this->categories = Category::all();
    }
    
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.components.indexpage.categories');
    }
}
