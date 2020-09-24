<?php

namespace Marketplaceful\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Marketplaceful\Actions\UpdateTag;

class UpdateTagForm extends Component
{
    use WithFileUploads;

    public $tag;

    public $state = [];

    public $image;

    public function mount($tag)
    {
        $this->tag = $tag;

        $this->state = $tag->withoutRelations()->toArray();
        ;
    }

    public function updateTag(UpdateTag $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->tag,
            $this->image
                ? array_merge($this->state, ['image' => $this->image])
                : $this->state,
        );

        if (isset($this->image)) {
            return redirect()->route('marketplaceful::tags.show', ['tag' => $this->tag]);
        }

        $this->emit('saved');
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('marketplaceful::tags.update-tag-form');
    }
}
