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
    public $available_routes = [];
    public $available_icons = [
        'Solid' => [
            'fas fa-home' => 'Home',
            'fas fa-user' => 'User',
            'fas fa-cog' => 'Settings',
            'fas fa-calendar' => 'Calendar',
            'fas fa-search' => 'Search',
            'fas fa-envelope' => 'Mail',
            'fas fa-bell' => 'Notification',
            'fas fa-file' => 'File',
            'fas fa-folder' => 'Folder',
            'fas fa-chart-bar' => 'Chart',
            'fas fa-users' => 'Users',
            'fas fa-tasks' => 'Tasks',
            'fas fa-star' => 'Star'
        ],
        'Regular' => [
            'far fa-user' => 'User Outline',
            'far fa-file' => 'File Outline',
            'far fa-folder' => 'Folder Outline',
            'far fa-calendar' => 'Calendar Outline',
            'far fa-bell' => 'Bell Outline',
            'far fa-envelope' => 'Mail Outline',
            'far fa-star' => 'Star Outline',
            'far fa-circle' => 'Circle Outline',
            'far fa-square' => 'Square Outline'
        ],
        'Brands' => [
            'fab fa-github' => 'GitHub',
            'fab fa-twitter' => 'Twitter',
            'fab fa-facebook' => 'Facebook',
            'fab fa-linkedin' => 'LinkedIn',
            'fab fa-youtube' => 'YouTube',
            'fab fa-slack' => 'Slack'
        ]
    ];

    public function mount()
    {
        $this->loadItems();
        $this->loadAvailableRoutes();
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

    public function moveItem($id, $direction)
    {
        $item = NavigationSetting::find($id);
        $items = NavigationSetting::where('parent_id', $item->parent_id)
            ->orderBy('order')
            ->get();

        $currentIndex = $items->search(function($i) use ($id) {
            return $i->id === $id;
        });

        if ($direction === 'up' && $currentIndex > 0) {
            $previousItem = $items[$currentIndex - 1];
            $currentOrder = $item->order;
            $item->update(['order' => $previousItem->order]);
            $previousItem->update(['order' => $currentOrder]);
        } elseif ($direction === 'down' && $currentIndex < $items->count() - 1) {
            $nextItem = $items[$currentIndex + 1];
            $currentOrder = $item->order;
            $item->update(['order' => $nextItem->order]);
            $nextItem->update(['order' => $currentOrder]);
        }

        $this->loadItems();
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

    private function loadAvailableRoutes()
    {
        $routes = collect(\Route::getRoutes())->map(function ($route) {
            return $route->getName();
        })->filter()->sort()->values()->toArray();
        $this->available_routes = $routes;
    }

    public function exportToJson()
    {
        $navigationItems = $this->items->map(function ($item) {
            return [
                'name' => $item->title,
                'route_name' => $item->route_name,
                'icon' => $item->icon,
                'children' => $this->items
                    ->where('parent_id', $item->id)
                    ->map(function ($child) {
                        return [
                            'name' => $child->title,
                            'route_name' => $child->route_name
                        ];
                    })
                    ->values()
                    ->toArray()
            ];
        })->where('parent_id', null)->values()->toArray();

        $jsonContent = json_encode($navigationItems, JSON_PRETTY_PRINT);
        file_put_contents(storage_path('app/navigation_settings.json'), $jsonContent);

        session()->flash('message', 'Navigation settings exported successfully!');
    }

    public function render()
    {
        return view('livewire.navigation-settings')->layout('layouts.app');
    }
}