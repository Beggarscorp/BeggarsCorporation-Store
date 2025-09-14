<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Categories extends Component
{
    #[Layout('layouts.admin')]
    public function render(): mixed
    {
        return view('livewire.admin.categories', [
            'title' => 'Categories',
        ]);
    }
}

