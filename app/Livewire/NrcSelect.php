<?php

namespace App\Livewire;

use App\Models\Nrc;
use Livewire\Component;

class NrcSelect extends Component
{
    public $selectedNrc;
    public $componentId;

    public function mount($componentId)
    {
        $this->componentId = $componentId;
        $this->nrcs = Nrc::select('name_mm', 'nrc_code', 'id')->get();
    }


    public function updating($property, $value)
    {
        dd($property, $value);
    }

    public function aa(){
        dd($this->selectedNrc);
    }
//    public function updatedSelectedNrc()
//    {
//        $selectedNrcData = $this->nrcs->firstWhere('id', $this->selectedNrc);
//
//        dd($selectedNrcData);
//        $this->dispatch('nrcSelected', $selectedNrcData);
//    }

    public function render()
    {
        return view('livewire.nrc-select');
    }
}
