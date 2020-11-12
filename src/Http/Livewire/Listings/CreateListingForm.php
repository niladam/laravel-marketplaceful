<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Marketplaceful\Actions\CreateListing;
use Marketplaceful\Models\Tag;

class CreateListingForm extends Component
{
    use WithFileUploads;

    public $state = [];

    public $image;

    public $uploads = [];

    public $photos;

    public $tags;

    public $currentTags = [];

    public function createListing(CreateListing $creator)
    {
        $this->resetErrorBag();

        $creator->create(
            Auth::user(),
            collect($this->state)
                ->merge(['uploads' => $this->uploads])
                ->merge(['tags' => $this->currentTags])
                ->when($this->image, fn ($state) => $state->merge(['image' => $this->image]))
                ->when(isset($this->photos), fn ($state) => $state->merge(['photos' => $this->photos]))
                ->toArray()
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
        return view('marketplaceful::livewire.listings.create-listing-form');
    }
}
