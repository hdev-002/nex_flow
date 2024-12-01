<?php

namespace App\Livewire;

use App\Models\Application;
use Livewire\Component;

class ApplicationGallery extends Component
{
    public $defaultApps;
    public $moduleApps;
    public $packageApps;
    public $addonApps;

    public function mount()
    {
        $this->defaultApps = Application::defaultApps()->get();
        $this->moduleApps = Application::moduleApps()->get();
        $this->packageApps = Application::packageApps()->get();
        $this->addonApps = Application::addonApps()->get();
    }
    public function render()
    {
        return view('livewire.application-gallery');
    }
}
