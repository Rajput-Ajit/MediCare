<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartItem extends Component
{
   public $medicine;
    public $quantity;
    public $img;
    public $discountedPrice;
    public $mrp;
    public $percentOff;
    /**
     * Create a new component instance.
     */
    public function __construct($cartItem)
    {
        //
        $this->medicine = $cartItem['medicine'];
        $this->quantity = $cartItem['quantity'];
        $this->img = $this->medicine['productImages'];

        $this->discountedPrice = $this->quantity * $this->medicine['sellingPrice'];
        $this->mrp = $this->quantity * $this->medicine['mrp'];

        $this->percentOff = $this->mrp > 0 ? (($this->mrp - $this->discountedPrice) / $this->mrp) * 100 : 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-item');
    }
}
