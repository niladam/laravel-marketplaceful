<?php

namespace Marketplaceful\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Marketplaceful\Actions\UpdateListing;
use Marketplaceful\Models\Tag;

class UpdateListingForm extends Component
{
    use WithFileUploads;

    public $listing;

    public $state = [];

    public $image;

    public $tags;

    public $currentTags = [];

    public function mount($listing)
    {
        $this->listing = $listing;

        $this->state = $listing->withoutRelations()->toArray();

        $this->state['price'] = $listing->priceForHumans;

        $this->currentTags = $listing->tags->pluck('id')->toArray();

        $this->tags = Tag::all();
    }

    public function updateListing(UpdateListing $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->listing,
            $this->image
                ? array_merge($this->state, ['image' => $this->image, 'tags' => $this->currentTags])
                : array_merge($this->state, ['tags' => $this->currentTags]),
        );

        if (isset($this->image)) {
            return redirect()->route('marketplaceful::listings.show', ['listing' => $this->listing]);
        }

        $this->emit('saved');
    }

    public function render()
    {
        return view('marketplaceful::listings.update-listing-form');
    }
}
