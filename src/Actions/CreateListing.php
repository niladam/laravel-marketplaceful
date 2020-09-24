<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;
use Marketplaceful\Models\Listing;

class CreateListing
{
    public function create($user, array $input)
    {
        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000000000'],
            'tags' => ['nullable', 'sometimes', 'array'],
            'tags.*' => ['nullable', 'sometimes', 'exists:tags,id'],
        ])->validateWithBag('createTag');

        $listing = Listing::create([
            'author_id' => $user->id,
            'title' => $input['title'],
            'description' => $input['description'] ?? null,
        ]);

        if (isset($input['tags'])) {
            $listing->tags()->sync(
                collect($input['tags'])->mapWithKeys(
                    fn($tag, $key) => [$tag => ['order_column' => $key + 1]]
                )
            );
        }

        return $listing;
    }
}
