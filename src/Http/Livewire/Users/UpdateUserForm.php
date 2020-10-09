<?php

namespace Marketplaceful\Http\Livewire\Users;

use Livewire\Component;
use Livewire\WithFileUploads;
use Marketplaceful\Actions\UpdateUser;

class UpdateUserForm extends Component
{
    use WithFileUploads;

    public $user;

    public $state = [];

    public $photo;

    public function mount($user)
    {
        $this->user = $user;

        $this->state = $user->withoutRelations()->toArray();
        ;
    }

    public function updateUser(UpdateUser $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            $this->user,
            $this->photo
                ? array_merge($this->state, ['photo' => $this->photo])
                : $this->state,
        );

        if (isset($this->photo)) {
            return redirect()->route('marketplaceful::user.show', ['user' => $this->user]);
        }

        $this->emit('saved');
    }

    public function render()
    {
        return view('marketplaceful::livewire.users.update-user-form');
    }
}
