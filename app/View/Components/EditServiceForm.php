<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditServiceForm extends Component
{
    public $service;
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct($service, $categories)
    {
        //
        $this->service = $service;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-service-form');
    }
}
