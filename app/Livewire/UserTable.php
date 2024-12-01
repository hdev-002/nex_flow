<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    protected $listeners = ['userCreated' => '$refresh', 'userUpdated' => '$refresh'];

    public function deleteUser($userId)
    {
        User::findOrFail($userId)->delete();
        session()->flash('message', 'User deleted successfully.');
    }

    public function render()
    {
        return view('livewire.user-table', [
            'users' => User::paginate(10),
        ]);
    }
}
