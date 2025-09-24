<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class AboutUs extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.about-us',[
            'title' => 'About Us'
        ]);
    }
}
