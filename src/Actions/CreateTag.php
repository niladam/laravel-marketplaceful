<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;
use Marketplaceful\Models\Tag;
use Marketplaceful\Rules\Hex;

class CreateTag
{
    public function create($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:tags'],
            'color' => ['nullable', 'string', 'max:255', new Hex],
            'description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('createTag');

        $tag = Tag::create([
            'name' => $input['name'],
            'slug' => $input['slug'] ?? null,
            'color' => $input['color'] ?? null,
            'description' => $input['description'] ?? null,
        ]);

        if (isset($input['image'])) {
            $tag->updateFeatureImage($input['image']);
        }

        return $tag;
    }
}
