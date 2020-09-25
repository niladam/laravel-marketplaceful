<?php

namespace Tests;

use Marketplaceful\Actions\CreateTag;

function createTag()
{
    $action = new CreateTag;

    return $action->create(test()->user, ['name' => 'Test Tag']);
}
