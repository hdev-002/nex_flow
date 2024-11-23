<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{
    public $name, $email, $password;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

    public function createUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

//        $this->emit('userCreated');
        session()->flash('message', 'User created successfully.');

        // Clear input fields
        $this->reset(['name', 'email', 'password']);
        return redirect()->to('/users/list');
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
