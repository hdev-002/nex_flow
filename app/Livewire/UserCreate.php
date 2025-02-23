<?php

namespace App\Livewire;

use App\Models\Settings\Location;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{
    public $name, $email, $password, $default_location_id;
    public $defaultLocations;
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'default_location_id' => 'required',
    ];

    public function mount()
    {
        $this->defaultLocations = Location::all();
    }
    public function createUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'default_location_id' => $this->default_location_id,
        ]);

        session()->flash('success', 'User created successfully.');

        // Clear input fields
        $this->reset(['name', 'email', 'password']);
        return redirect()->to('/users/list');
    }

    public function render()
    {
        return view('livewire.user-create');
    }
}
