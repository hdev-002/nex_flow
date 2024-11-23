<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppCard extends Component
{
    public $app;


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        dd($this->app);
        return view('components.app-card');
    }
}
