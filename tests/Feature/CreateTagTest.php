<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Marketplaceful\Actions\CreateTag;
use Marketplaceful\Models\Tag;

uses(Tests\TestCase::class);

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::forceCreate([
        'name' => 'Oliver Jiménez Servín',
        'email' => 'oliver@radiocubito.com',
        'password' => 'secret',
    ]);
});

test('tag can be created', function () {
    $action = new CreateTag;

    $tag = $action->create(test()->user, ['name' => 'Test Tag']);

    expect($tag)->toBeInstanceOf(Tag::class);
});

test('name is required', function () {
    $action = new CreateTag;

    $tag = $action->create(test()->user, ['name' => '']);
})->throws(ValidationException::class);
