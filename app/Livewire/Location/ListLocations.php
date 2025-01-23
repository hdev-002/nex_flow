<?php

namespace App\Livewire\Location;

use App\Interfaces\LocationRepositoryInterface;
use App\Models\Settings\Location;
use App\WithDataTableFilters;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListLocations extends Component
{
    use WithPagination, WithDataTableFilters;
    public $locations;

    public function render()
    {

        $query = Location::query();
        $searchableColumns = ['name','code'];

        $filterableColumns = [];

        $locationsQuery = $this->applySearchAndFilters($query, $searchableColumns, $filterableColumns);

        if ($this->perPage === 'All'){
            $this->locations = $locationsQuery->get();
        }else{
            $locations = $locationsQuery->paginate($this->perPage);
            $this->locations = $locations->items();
        }

        return view('livewire.location.list-locations', [
            'locations' => $this->locations,
        ])->layout('layouts.app');
    }

    public function deleteLocation($location_id)
    {
        $location = Location::findOrFail($location_id);

        $childLocations = Location::where('parent_id', $location_id)->get();

        if ($childLocations->isNotEmpty()) {
            $this->dispatch('location-has-children', $childLocations->toArray());
            return;
        }

        $hasUsers = $location->users()->exists();

        if ($hasUsers) {
            $this->dispatch('location-has-users', $location->users->toArray());
            return;
        }

        $location->delete();

        $this->dispatch('location-deleted');

        $this->resetPage();
    }



}
