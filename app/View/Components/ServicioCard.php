<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ServicioCard extends Component
{
    public $services;
    /**
     * Create a new component instance.
     */
    public function __construct($services)
    {
        //
        $this->services = $services;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.servicio-card');
    }
}