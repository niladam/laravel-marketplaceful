<?php

namespace Marketplaceful\Http\Controllers;

use Illuminate\Http\Request;
use Marketplaceful\Models\Listing;

class ListingController
{
    public function index()
    {
        return view('marketplaceful::listings.index');
    }

    public function create()
    {
        return view('marketplaceful::listings.create');
    }

    public function show(Request $request, $listingId)
    {
        $listing = Listing::findOrFail($listingId);

        return view('marketplaceful::listings.show', [
            'listing' => $listing,
        ]);
    }
}
