<?php

namespace Marketplaceful\Http\Livewire\Listings;

use Livewire\Component;

class CreateListing extends Component
{
    public function render()
    {
        return view('marketplaceful::livewire.listings.create-listing')
            ->layout('marketplaceful::layouts.base');
    }
}
