<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class PrivacyPolicy extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.privacy-policy', [
            'title' => 'Privacy Policy'
        ]);
    }
}
