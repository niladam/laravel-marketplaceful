<?php

namespace Marketplaceful\Http\Livewire\Users;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class UserList extends Component
{
    public Collection $users;

    public function mount($users)
    {
        $this->users = $users;
    }

    public function render()
    {
        return view('marketplaceful::livewire.users.user-list');
    }
}
