<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;

class UpdateListing
{
    public function update($user, $listing, array $input)
    {
        // Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string', 'max:1000000000'],
            'tags' => ['nullable', 'sometimes', 'array'],
            'tags.*' => ['nullable', 'sometimes', 'exists:tags,id'],
        ])->validateWithBag('updateListing');

        if (isset($input['image'])) {
            $listing->updateFeatureImage($input['image']);
        }

        if (isset($input['tags'])) {
            $listing->tags()->sync(
                collect($input['tags'])->mapWithKeys(
                    fn ($tag, $key) => [$tag => ['order_column' => $key + 1]]
                )
            );
        }

        $listing->forceFill([
            'title' => $input['title'],
            'description' => $input['description'],
            'price_for_editing' => $input['price'] ?? null,
        ])->save();
    }
}
