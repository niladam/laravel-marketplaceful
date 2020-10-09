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

    public $tags;

    public $currentTags = [];

    public function createListing(CreateListing $creator)
    {
        $this->resetErrorBag();

        $creator->create(
            Auth::user(),
            $this->image
                ? array_merge($this->state, ['image' => $this->image, 'tags' => $this->currentTags])
                : array_merge($this->state, ['tags' => $this->currentTags]),
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
