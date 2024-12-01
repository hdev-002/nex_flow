<?php

namespace App\Livewire;

use App\Models\Nrc;
use Livewire\Component;

class DataSelect2 extends Component
{
    public $options;
    public $componentId;
    public $valueField;
    public $labelField;

    public $dataSelected;

    public $defaultSelected;

    public $loadData = false;

    public function mount($options, $componentId, $valueField, $labelField, $defaultSelected = null)
    {
        $this->options = $options;
        $this->componentId = $componentId;
        $this->valueField = $valueField;
        $this->labelField = $labelField;

        $this->defaultSelected = $defaultSelected;

    }

    public function updatedDataSelected()
    {
//        dd($this->dataSelected);
        $this->dispatch($this->componentId, $this->dataSelected);
    }

    public function render()
    {
        return view('livewire.data-select2');
    }
}
