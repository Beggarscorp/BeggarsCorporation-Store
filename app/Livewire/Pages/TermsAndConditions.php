<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class TermsAndConditions extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.terms-and-conditions', [
            'title' => 'Terms and Conditions'
        ]);
    }
}
