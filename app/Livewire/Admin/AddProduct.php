<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AddProduct extends Component
{
    public function render()
    {
        return view('livewire.admin.add-product')->layout('layouts.admin')->with(['title' => 'Add Product']);
    }
}
