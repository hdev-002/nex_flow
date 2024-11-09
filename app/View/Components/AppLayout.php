<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public bool $hasHeader;
    public bool $hasSidebar;
    public bool $hasToolbar;
    public array $navigationItems;

    /**
     * Create a new component instance.
     *
     * @param bool $hasHeader
     * @param bool $hasSidebar
     * @param bool $hasToolbar
     * @param string|null $navigationSection
     */
    public function __construct(
        bool $hasHeader = true,
        bool $hasSidebar = true,
        bool $hasToolbar = true,
        ?string $navigationSection = null
    ) {
        $this->hasHeader = $hasHeader;
        $this->hasSidebar = $hasSidebar;
        $this->hasToolbar = $hasToolbar;

        // Load navigation items if a section is provided
        $this->navigationItems = $navigationSection ? getNavigation($navigationSection) : [];
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
