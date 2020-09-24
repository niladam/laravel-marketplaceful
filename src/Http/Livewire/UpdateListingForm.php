<?php

namespace Marketplaceful\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\UpdateListing;
use Marketplaceful\Models\Tag;

class UpdateListingForm extends Component
{
    public $listing;

    public $state = [];

    public $tags;

    public $currentTags = [];

    public function mount($listing)
    {
        $this->listing = $listing;

        $this->state = $listing->withoutRelations()->toArray();

        $this->currentTags = $listing->tags->pluck('id')->toArray();

        $this->tags = Tag::all();
    }

    public function updateListing(UpdateListing $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->listing,
            array_merge($this->state, ['tags' => $this->currentTags]),
        );

        $this->emit('saved');
    }

    public function render()
    {
        return view('marketplaceful::listings.update-listing-form');
    }
}
