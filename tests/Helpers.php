<?php

namespace Tests;

use Marketplaceful\Actions\CreateListing;
use Marketplaceful\Actions\CreateTag;

function createTag()
{
    $action = new CreateTag;

    return $action->create(test()->user, ['name' => 'Test Tag']);
}

function createListing()
{
    $action = new CreateListing;

    return $action->create(test()->user, ['title' => 'Test Listing']);
}
