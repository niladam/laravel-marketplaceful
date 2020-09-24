<?php

namespace Marketplaceful\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Marketplaceful\Actions\CreateListing;
use Marketplaceful\Models\Tag;

class CreateListingForm extends Component
{
    use WithFileUploads;

    public $state = [];

    public $tags;

    public $currentTags = [];

    public function createListing(CreateListing $creator)
    {
        $this->resetErrorBag();

        $creator->create(
            Auth::user(),
            array_merge($this->state, ['tags' => $this->currentTags]),
        );

        return redirect(route('marketplaceful::listings.index'));
    }

    public function getUserProperty()
    {
        return Auth::user();
    }

    public function mount()
    {
        $this->tags = Tag::all();
    }

    public function render()
    {
        return view('marketplaceful::listings.create-listing-form');
    }
}
