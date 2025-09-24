<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CancellationAndRefundPolicy extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.cancellation-and-refund-policy', [
            'title' => 'Cancellation and Refund Policy'
        ]);
    }
}
