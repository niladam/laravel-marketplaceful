<?php

namespace Marketplaceful\Http\Livewire;

use Livewire\Component;
use Marketplaceful\Actions\SuspendUser;

class SuspendUserForm extends Component
{
    public $user;

    public $confirmingUserSuspension = false;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function suspendUser(SuspendUser $suspender)
    {
        $suspender->suspend($this->user);

        return redirect()->route('marketplaceful::users.show', ['user' => $this->user]);
    }

    public function render()
    {
        return view('marketplaceful::users.suspend-user-form');
    }
}
