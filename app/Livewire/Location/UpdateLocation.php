<?php

namespace App\Livewire\Location;

use App\Models\Settings\Location;
use Livewire\Component;

class UpdateLocation extends Component
{

    public $locationTypes = [
        ['id' => 'warehouse', 'name' => 'Warehouse'],
        ['id' => 'retail', 'name' => 'Retail'],
        ['id' => 'office', 'name' => 'Office'],
        ['id' => 'manufacturing', 'name' => 'Manufacturing'],
        ['id' => 'branch', 'name' => 'Branch'],
        ['id' => 'virtual', 'name' => 'Virtual'],
        ['id' => 'other', 'name' => 'Other'],
    ];
    public $parentLocations;
    public $locationId, $name, $code, $parent_id, $location_type, $status, $address, $latitude, $longitude;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:locations,code,' . $this->locationId,
            'location_type' => 'required|string',
            'address' => 'nullable|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
        ];
    }


    public function mount($id)
    {
        $this->parentLocations = Location::whereNot('id',$id)->whereNot('parent_id', $id)->get();

        $location = Location::findOrFail($id);
        $this->locationId = $location->id;
        $this->name = $location->name;
        $this->parent_id = $location->parent_id;
        $this->code = $location->code;
        $this->location_type = $location->location_type;
        $this->status = $location->status;
        $this->address = $location->address;
        $this->latitude = $location->latitude;
        $this->longitude = $location->longitude;
    }

    public function updateLocation()
    {
        $this->validate();

        $location = Location::findOrFail($this->locationId);
        $location->update([
            'name' => $this->name,
            'code' => $this->code,
            'parent_id' => $this->parent_id,
            'location_type' => $this->location_type,
            'status' => $this->status,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'updated_by' => auth()->id(),
        ]);

        session()->flash('success', 'Location updated successfully!');
        return redirect()->route('locations.list');
    }

    public function render()
    {
        return view('livewire.location.update-location')->layout('layouts.app');
    }
}
