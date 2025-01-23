<?php

namespace App\Livewire\Location;

use App\Interfaces\LocationRepositoryInterface;
use App\Models\Settings\Location;
use App\Repositories\LocationRepository;
use Livewire\Component;

class CreateLocation extends Component
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
    public $status = true;
    public $name, $code, $parent_id, $location_type, $address, $latitude, $longitude;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'location_type' => 'required|string',
            'address' => 'nullable|string',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
        ];
    }

    public function mount()
    {
        $this->parentLocations = Location::get();
    }

    public function create()
    {
        $this->validate();
        try {


            Location::create([
                'name' => $this->name,
                'code' => $this->code(),
                'parent_id' => $this->parent_id ?? null,
                'location_type' => $this->location_type,
                'status' => $this->status ?? false,
                'address' => $this->address,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'created_by' => auth()->id(),
            ]);

            session()->flash('success', 'Location created successfully!');
            return redirect()->route('locations.list');
        } catch (\Exception $e) {
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function code()
    {
        $lastLocation = Location::latest()->first();
        $serialNumber = 1;

        if ($lastLocation) {
            $lastCode = $lastLocation->code;
            $serialNumber = intval(substr($lastCode, 1)) + 1;
        }

        return 'L' . str_pad($serialNumber, 4, '0', STR_PAD_LEFT);
    }

    public function render()
    {
        return view('livewire.location.create-location')->layout('layouts.app');
    }
}
