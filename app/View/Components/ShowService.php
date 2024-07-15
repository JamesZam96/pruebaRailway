<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShowService extends Component
{
    public $service;
    /**
     * Create a new component instance.
     */
    public function __construct($service)
    {
        //
        $this->service = $service;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-service');
    }
}
