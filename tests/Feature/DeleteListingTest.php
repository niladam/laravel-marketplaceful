<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Marketplaceful\Actions\DeleteListing;
use Marketplaceful\Tests\Fixtures\User;

// uses(Marketplaceful\Tests\TestCase::class);

uses(RefreshDatabase::class);

use function Tests\createListing;

beforeEach(function () {
    $this->user = User::forceCreate([
        'name' => 'Oliver Jiménez Servín',
        'email' => 'oliver@radiocubito.com',
        'password' => 'secret',
    ]);
});

test('listing can be deleted', function () {
    $listing = createListing();

    $action = new DeleteListing;

    $action->delete($listing);

    expect($listing->fresh())->toBeNull();
});
