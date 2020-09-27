<?php

use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\CreateListing;
use Marketplaceful\Models\Listing;
use Marketplaceful\Tests\Fixtures\User;

beforeEach(function () {
    $this->user = User::forceCreate([
        'name' => 'Oliver Jiménez-Servín',
        'email' => 'oliver@radiocubito.com',
        'password' => 'secret',
    ]);
});

test('listing can be created', function () {
    $action = new CreateListing;

    $listing = $action->create(test()->user, [
        'title' => 'Test listing',
    ]);

    expect($listing)->toBeInstanceOf(Listing::class);
});

test('name is required', function () {
    $action = new CreateListing;

    $listing = $action->create(test()->user, ['name' => '']);
})->throws(ValidationException::class);
