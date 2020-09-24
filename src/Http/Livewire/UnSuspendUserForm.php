<?php

namespace Marketplaceful\Http\Livewire;

use Livewire\Component;
use Marketplaceful\Actions\UnSuspendUser;

class UnSuspendUserForm extends Component
{
    public $user;

    public $confirmingUserUnSuspension = false;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function unSuspendUser(UnSuspendUser $unSuspender)
    {
        $unSuspender->unSuspend($this->user);

        return redirect()->route('marketplaceful::users.show', ['user' => $this->user]);
    }

    public function render()
    {
        return view('marketplaceful::users.un-suspend-user-form');
    }
}
