<?php

namespace Marketplaceful\Http\Livewire\Users;

use Livewire\Component;

class ShowUser extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = config('marketplaceful.user_model')::findOrFail($user);
    }

    public function render()
    {
        return view('marketplaceful::livewire.users.show-user')
            ->layout('marketplaceful::layouts.base');
    }
}
