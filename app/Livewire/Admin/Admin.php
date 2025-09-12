<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Admin extends Component
{
    public function render()
    {
        return view('livewire.admin.admin')->layout('layouts.admin')->with(['title' => 'Admin Panel']);
    }
}
