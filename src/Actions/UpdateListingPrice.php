<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;

class UpdateListingPrice
{
    public function update($user, $listing, array $input)
    {
        // Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'price' => ['nullable', 'integer'],
        ])->validateWithBag('updateListingPrice');

        $listing->forceFill([
            'price' => $input['price'],
        ])->save();
    }
}
