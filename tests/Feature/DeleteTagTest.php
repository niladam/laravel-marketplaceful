<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Marketplaceful\Actions\CreateTag;
use Marketplaceful\Actions\DeleteTag;
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

test('tag can be deleted', function () {
    $tag = createTag();

    $action = new DeleteTag;

    $action->delete($tag);

    expect($tag->fresh())->toBeNull();
});
