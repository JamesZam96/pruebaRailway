<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ProductCardSession extends Component
{
    public $products;
    /**
     * Create a new component instance.
     */
    public function __construct($products)
    {
        //
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card-session');
    }
}
