<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Layout;

class ShippingAndDeliveryPolicy extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.shipping-and-delivery-policy', [
            'title' => 'Shipping and Delivery Policy'
        ]);
    }
}
