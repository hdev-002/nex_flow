<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public bool $hasHeader;
    public bool $hasSidebar;
    public bool $hasToolbar;

    public $navigationItems;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($hasHeader = true, $hasSidebar = true, $hasToolbar = true,
    $navigationItems = []
    )
    {
        $this->hasHeader = $hasHeader;
        $this->hasSidebar = $hasSidebar;
        $this->hasToolbar = $hasToolbar;

        $this->navigationItems = $navigationItems;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
