<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderSummary extends Component
{   
    public $cartCount;
    public $grandTotal;
    public $deliveryCharges;
    public $totalDiscounted;
    public $addressesCount;
    /**
     * Create a new component instance.
     */
    public function __construct($cartCount, $grandTotal, $deliveryCharges, $totalDiscounted, $addressesCount)
    {
        //
        $this->cartCount = $cartCount;
        $this->grandTotal = $grandTotal;
        $this->deliveryCharges = $deliveryCharges;
        $this->totalDiscounted = $totalDiscounted;
        $this->addressesCount = $addressesCount;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order-summary');
    }
}
