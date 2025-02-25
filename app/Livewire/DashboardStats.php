<?php

namespace App\Livewire;

use App\Models\BusinessLocation;
use App\Models\User;
use App\Models\WidgetSetting;
use Livewire\Component;

class DashboardStats extends Component
{
    public $widgets = [];
    public $editingWidget = null;
    public $availableDataTypes = [
        'users' => 'Total Users',
        'locations' => 'Total Locations',
        'active_users' => 'Active Users',
        'active_locations' => 'Active Locations'
    ];
    
    public function mount()
    {
        $this->loadWidgets();
    }

    public function loadWidgets()
    {
        // Load user's widget settings or create defaults
        $this->widgets = WidgetSetting::where('user_id', auth()->id())
            ->where('widget_type', 'stats_card')
            ->orderBy('position')
            ->get()
            ->toArray();

        if (empty($this->widgets)) {
            $this->createDefaultWidgets();
        }

        // Update real-time counts
        foreach ($this->widgets as &$widget) {
            $widget['count'] = $this->getCount($widget['value_type']);
        }
    }

    private function createDefaultWidgets()
    {
        $defaults = [
            ['title' => 'Total Users', 'value_type' => 'users', 'position' => 0],
            ['title' => 'Total Locations', 'value_type' => 'locations', 'position' => 1],
            ['title' => 'Active Users', 'value_type' => 'active_users', 'position' => 2],
            ['title' => 'Active Locations', 'value_type' => 'active_locations', 'position' => 3],
        ];

        foreach ($defaults as $widget) {
            WidgetSetting::create([
                'user_id' => auth()->id(),
                'widget_type' => 'stats_card',
                'title' => $widget['title'],
                'value_type' => $widget['value_type'],
                'position' => $widget['position'],
                'visible' => true,
            ]);
        }

        $this->loadWidgets();
    }

    private function getCount($type)
    {
        return match ($type) {
            'users' => User::count(),
            'locations' => BusinessLocation::count(),
            'active_users' => User::count(),
            'active_locations' => BusinessLocation::count(),
            default => 0,
        };
    }

    public function startEditing($widgetId)
    {
        $this->editingWidget = collect($this->widgets)->firstWhere('id', $widgetId);
    }

    protected $rules = [
        'editingWidget.title' => 'required|string|max:20'
    ];

    protected $messages = [
        'editingWidget.title.required' => 'The widget title is required.',
        'editingWidget.title.max' => 'The widget title must not exceed 30 characters.'
    ];

    public function saveWidget()
    {
        $this->validate();

        $widget = WidgetSetting::find($this->editingWidget['id']);
        $widget->update([
            'title' => $this->editingWidget['title'],
            'visible' => $this->editingWidget['visible'],
            'value_type' => $this->editingWidget['value_type'],
            'position' => $this->editingWidget['position']
        ]);

        $this->editingWidget = null;
        $this->loadWidgets();
    }

    public function updateWidgetOrder($orderedIds)
    {
        foreach ($orderedIds as $position => $id) {
            WidgetSetting::where('id', $id)->update(['position' => $position]);
        }
        $this->loadWidgets();
    }

    public function render()
    {
        return view('livewire.dashboard-stats');
    }
}