<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;

trait WithDataTableFilters
{
    public $search = '';
    public $filters = [];
    public $sortField = 'id';  // Column to sort by
    public $sortDirection = 'desc'; // Sorting direction: asc or desc

    public $perPage = 10;
    public $aviablePerPages=[
        '10','30','45','55','100','200', 'All'
    ];


    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination when search changes
    }

    public function resetSearch()
    {
        $this->search = ''; // Clear the search term
        $this->resetPage(); // Reset pagination to the first page
    }


    public function updatingFilters()
    {
        $this->resetPage(); // Reset pagination when filters change
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // Toggle sorting direction if the same column is clicked
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // Set new sort field and default direction
            $this->sortField = $field;
            $this->sortDirection = 'desc';
        }

        $this->resetPage(); // Reset pagination on sort
    }


    protected function applySearchAndFilters(Builder $query, array $searchableColumns, array $filterableColumns = []): Builder
    {
        // Apply search
        if (!empty($this->search)) {
            $query->where(function ($q) use ($searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $q->orWhere($column, 'like', '%' . $this->search . '%');
                }
            });
        }

        // Apply filters
        foreach ($this->filters as $column => $value) {
            if (in_array($column, $filterableColumns) && $value !== null && $value !== '') {
                $query->where($column, $value);
            }
        }

        // Apply sorting
        if (!empty($this->sortField)) {
            $query->orderBy($this->sortField, $this->sortDirection);
        }

        return $query;
    }
}
