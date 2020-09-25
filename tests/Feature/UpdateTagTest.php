<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\CreateTag;
use Marketplaceful\Actions\UpdateTag;
use Marketplaceful\Tests\Fixtures\User;

// uses(Marketplaceful\Tests\TestCase::class);

uses(RefreshDatabase::class);

use function Tests\createTag;

beforeEach(function () {
    $this->user = User::forceCreate([
        'name' => 'Oliver Jiménez Servín',
        'email' => 'oliver@radiocubito.com',
        'password' => 'secret',
    ]);
});

test('tag can be updated', function () {
    $tag = createTag();

    $action = new UpdateTag;

    $action->update(test()->user, $tag, ['name' => 'Test Tag Updated']);

    expect($tag->fresh()->name)->toBe('Test Tag Updated');
});

test('name is required', function () {
    $tag = createTag();

    $action = new UpdateTag;

    $action->update(test()->user, $tag, ['name' => '']);
})->throws(ValidationException::class);
