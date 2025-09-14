<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

class AllProducts extends Component
{
    #[Layout('layouts.admin')]
    public function render(): mixed
    {
        return view('livewire.admin.all-products', [
            'title' => 'All Products',
        ]);
    }
}