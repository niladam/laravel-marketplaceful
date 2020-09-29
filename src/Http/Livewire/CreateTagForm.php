<?php

namespace Marketplaceful\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\CreateTag;

class CreateTagForm extends Component
{
    public $state = [];

    public function createTag(CreateTag $creator)
    {
        $this->resetErrorBag();

        $creator->create(
            Auth::user(),
            $this->state
        );

        return redirect(route('marketplaceful::tags.index'));
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('marketplaceful::tags.create-tag-form');
    }
}
