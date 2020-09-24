<?php

namespace Marketplaceful\Http\Livewire;

use Livewire\Component;
use Marketplaceful\Actions\DeleteUser;

class DeleteUserForm extends Component
{
    public $user;

    public $confirmingUserDeletion = false;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function deleteUser(DeleteUser $deleter)
    {
        $deleter->delete($this->user);

        return redirect()->route('marketplaceful::users.index');
    }

    public function render()
    {
        return view('marketplaceful::users.delete-user-form');
    }
}
