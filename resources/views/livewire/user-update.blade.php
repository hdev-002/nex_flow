<!-- resources/views/livewire/users-update.blade.php -->

<div>
    <form wire:submit.prevent="updateUser">
        <input type="text" wire:model="name" placeholder="Name">
        @error('name') <span>{{ $message }}</span> @enderror

        <input type="email" wire:model="email" placeholder="Email">
        @error('email') <span>{{ $message }}</span> @enderror

        <input type="password" wire:model="password" placeholder="Password (optional)">
        @error('password') <span>{{ $message }}</span> @enderror

        <button type="submit">Update User</button>
    </form>
</div>
