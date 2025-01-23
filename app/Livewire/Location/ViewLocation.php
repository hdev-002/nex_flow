<?php

namespace App\Livewire\Location;

use App\Models\Settings\Location;
use Livewire\Component;

class ViewLocation extends Component
{
    public $location;
    public $childLocations;

    public function mount($id)
    {
        $this->location = Location::findOrFail($id);
        $this->childLocations = Location::where('parent_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.location.view-location')->layout('layouts.app');
    }
}
