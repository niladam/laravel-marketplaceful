<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Marketplaceful\Models\Listing;

class ListingList extends Component
{
    public Collection $listings;

    public function mount()
    {
        $this->listings = Listing::all();
    }

    public function render()
    {
        return view('marketplaceful::livewire.listings.listing-list');
    }
}
