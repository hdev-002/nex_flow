<?php

namespace App\Livewire;

use Livewire\Component;

class SaveStatus extends Component
{
    public $status = null; // Status of the draft: 'saving', 'saved', or null.

    public function saveDraft()
    {
        $this->status = 'saving';

        // Simulate the save operation (replace with actual logic)
        sleep(2); // Simulate a delay for saving
        $this->status = 'saved';

        // Automatically reset "saved" status after a few seconds
        $this->dispatchBrowserEvent('reset-status');
    }

    public function render()
    {
        return view('livewire.save-status');
    }
}
