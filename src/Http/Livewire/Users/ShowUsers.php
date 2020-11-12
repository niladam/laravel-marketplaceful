<?php

namespace Marketplaceful\Http\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;

    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $filters = [
        'search' => '',
        'status' => '',
    ];

    protected $queryString = ['sortField', 'sortDirection'];

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field
            ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc'
            : 'asc';

        $this->sortField = $field;
    }

    public function render()
    {
        return view('marketplaceful::livewire.users.show-users', [
            'users' => config('marketplaceful.user_model')::query()
                ->when($this->filters['status'], fn ($query, $status) => $query->where('status', $status))
                ->when($this->filters['search'], fn ($query, $search) => $query->where('name', 'like', '%'.$search.'%'))
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
        ])->layout('marketplaceful::layouts.base');
    }
}
