<?php

namespace Marketplaceful\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Marketplaceful\Actions\UpdateListing;
use Marketplaceful\Actions\UpdateListingPrice;

class UpdateListingPriceForm extends Component
{
    public $listing;

    public $state = [];

    public function mount($listing)
    {
        $this->listing = $listing;

        $this->state = $listing->withoutRelations()->toArray();
        ;
    }

    public function updateListing(UpdateListingPrice $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            $this->listing,
            $this->state,
        );

        $this->emit('saved');
    }

    public function render()
    {
        return view('marketplaceful::listings.update-listing-price-form');
    }
}
