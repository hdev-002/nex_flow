<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserUpdate extends Component
{
    public $userId, $name, $email, $password;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'nullable|min:6',
    ];



    public function mount($userId)
    {
        $this->userId = $userId;
        $this->loadUser($userId); // Call loadUser to populate other fields
    }


    public function loadUser($userId)
    {
        $user = User::findOrFail($userId);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateUser()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);
        $user->name = $this->name;
        $user->email = $this->email;
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }
        $user->save();

//        $this->emit('userUpdated');
        session()->flash('message', 'User updated successfully.');
        return redirect()->to('/users/list');
    }


    public function render()
    {
        return view('livewire.user-update');
    }
}
