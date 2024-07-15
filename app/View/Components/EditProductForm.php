<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditProductForm extends Component
{
    public $product;
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct($product, $categories)
    {
        //
        $this->product = $product;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-product-form');
    }
}
