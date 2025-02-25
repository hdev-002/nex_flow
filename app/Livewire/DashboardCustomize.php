<?php

namespace App\Livewire;

use App\Models\WidgetSetting;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;
// use Livewire\WithSortable;

class DashboardCustomize extends Component
{
    // use \Livewire\Attributes\Sortable;

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
        $this->widgets = WidgetSetting::where('user_id', auth()->id())
            ->where('widget_type', 'stats_card')
            ->orderBy('position')
            ->get()
            ->toArray();
    }

    public function startEditing($widgetId)
    {
        $widget = collect($this->widgets)->firstWhere('id', $widgetId);
        $this->editingWidget = [
            'id' => $widget['id'],
            'title' => $widget['title'],
            'value_type' => $widget['value_type'],
            'visible' => $widget['visible']
        ];
    }

    protected $rules = [
        'editingWidget.title' => 'required|string|max:30',
        'editingWidget.value_type' => 'required|string',
        'editingWidget.visible' => 'boolean'
    ];

    protected $messages = [
        'editingWidget.title.required' => 'The widget title is required.',
        'editingWidget.title.max' => 'The widget title must not exceed 30 characters.',
        'editingWidget.value_type.required' => 'Please select a data type for the widget.'
    ];

    public function saveWidget()
    {
        $this->validate();

        $widget = WidgetSetting::find($this->editingWidget['id']);
        $widget->update([
            'title' => $this->editingWidget['title'],
            'visible' => $this->editingWidget['visible'],
            'value_type' => $this->editingWidget['value_type']
        ]);

        $this->editingWidget = null;
        $this->loadWidgets();

        session()->flash('message', 'Widget updated successfully.');
    }

    public function updateWidgetOrder($orderedIds)
    {
        foreach ($orderedIds as $position => $id) {
            WidgetSetting::where('id', $id)->update(['position' => $position]);
        }
        $this->loadWidgets();
        session()->flash('message', 'Widget order updated successfully.');
    }

    public function toggleVisibility($widgetId)
    {
        $widget = WidgetSetting::find($widgetId);
        $widget->update(['visible' => !$widget->visible]);
        $this->loadWidgets();
    }

    public function render()
    {
        return view('livewire.dashboard-customize')->layout('layouts.app');
    }
}