<?php

namespace Marketplaceful\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Marketplaceful\Actions\CreateTag;

class CreateTagForm extends Component
{
    use WithFileUploads;

    public $state = [];

    public $image;

    public function createTag(CreateTag $creator)
    {
        $this->resetErrorBag();

        $creator->create(
            Auth::user(),
            $this->image
                ? array_merge($this->state, ['image' => $this->image])
                : $this->state,
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
