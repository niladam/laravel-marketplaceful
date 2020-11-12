<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Marketplaceful\Models\Listing;

class CreateListing
{
    public function create($user, array $input)
    {
        Validator::make($input, [
            'title' => ['required', 'string', 'max:255'],
            'price' => ['nullable', 'numeric'],
            'description' => ['nullable', 'string', 'max:1000000000'],
            'image' => ['nullable', 'image', 'max:1024'],
            'photos' => ['nullable', 'array'],
            'photos.*.source' => ['required', 'string'],
            'photos.*.origin' => ['required', Rule::in([1, 3])],
            'uploads' => ['nullable', 'array'],
            'uploads.*' => ['nullable', 'image', 'max:1024'],
            'tags' => ['nullable', 'array'],
            'tags.*' => ['nullable', 'exists:tags,id'],
        ])->validateWithBag('createTag');

        $listing = Listing::create([
            'author_id' => $user->id,
            'title' => $input['title'],
            'description' => $input['description'] ?? null,
            'price_for_editing' => $input['price'] ?? null,
        ]);

        if (isset($input['image'])) {
            $listing->updateFeatureImage($input['image']);
        }

        if (isset($input['photos'])) {
            $listing->updatePhotosFromFilepond($input['photos'], $input['uploads']);
        }

        if (isset($input['tags'])) {
            $listing->tags()->sync(
                collect($input['tags'])->mapWithKeys(
                    fn ($tag, $key) => [$tag => ['order_column' => $key + 1]]
                )
            );
        }

        return $listing;
    }
}
