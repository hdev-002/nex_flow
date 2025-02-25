<?php

namespace App\Livewire;

use App\Models\NavigationSetting;
use Livewire\Component;
use Livewire\Attributes\On;

class NavigationSettings extends Component
{
    public $items = [];
    public $editingItem = null;
    public $title;
    public $route_name;
    public $icon;
    public $is_visible = true;
    public $parent_id;
    public $permissions = [];

    public function mount()
    {
        $this->loadItems();
    }

    public function loadItems()
    {
        $this->items = NavigationSetting::orderBy('order')->get();
    }

    public function updateOrder($orderedIds)
    {
        foreach ($orderedIds as $order => $id) {
            NavigationSetting::where('id', $id)->update(['order' => $order]);
        }

        $this->dispatch('navigation-updated');
    }

    public function toggleVisibility($id)
    {
        $item = NavigationSetting::find($id);
        $item->is_visible = !$item->is_visible;
        $item->save();

        $this->dispatch('navigation-updated');
    }

    public function editItem($id)
    {
        $this->editingItem = NavigationSetting::find($id);
        $this->title = $this->editingItem->title;
        $this->route_name = $this->editingItem->route_name;
        $this->icon = $this->editingItem->icon;
        $this->is_visible = $this->editingItem->is_visible;
        $this->parent_id = $this->editingItem->parent_id;
        $this->permissions = $this->editingItem->permissions ?? [];
    }

    public function saveItem()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'route_name' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        if ($this->editingItem) {
            $this->editingItem->update([
                'title' => $this->title,
                'route_name' => $this->route_name,
                'icon' => $this->icon,
                'is_visible' => $this->is_visible,
                'parent_id' => $this->parent_id,
                'permissions' => $this->permissions,
            ]);
        } else {
            NavigationSetting::create([
                'title' => $this->title,
                'route_name' => $this->route_name,
                'icon' => $this->icon,
                'is_visible' => $this->is_visible,
                'parent_id' => $this->parent_id,
                'permissions' => $this->permissions,
                'order' => NavigationSetting::count(),
            ]);
        }

        $this->resetForm();
        $this->loadItems();
        $this->dispatch('navigation-updated');
    }

    public function deleteItem($id)
    {
        NavigationSetting::destroy($id);
        $this->loadItems();
        $this->dispatch('navigation-updated');
    }

    private function resetForm()
    {
        $this->editingItem = null;
        $this->title = '';
        $this->route_name = '';
        $this->icon = '';
        $this->is_visible = true;
        $this->parent_id = null;
        $this->permissions = [];
    }

    public function render()
    {
        return view('livewire.navigation-settings')->layout('layouts.app');
    }
}