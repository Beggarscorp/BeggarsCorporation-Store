<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Index extends Component
{

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.index',[
            'title' => 'Home',
        ]);
    }
}
