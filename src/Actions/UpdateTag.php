<?php

namespace Marketplaceful\Actions;

use Illuminate\Support\Facades\Validator;
use Marketplaceful\Rules\Hex;

class UpdateTag
{
    public function update($user, $tag, array $input)
    {
        // Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:tags,slug,'.$tag->id],
            'color' => ['nullable', 'string', 'max:255', new Hex],
            'description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateTag');

        if (isset($input['image'])) {
            $tag->updateFeatureImage($input['image']);
        }

        $tag->forceFill([
            'name' => $input['name'],
            'slug' => $input['slug'] ?? null,
            'color' => $input['color'] ?? null,
            'description' => $input['description'] ?? null,
        ])->save();
    }
}
