<?php

use Marketplaceful\Http\Livewire\Listings\CreateListing;
use Marketplaceful\Http\Livewire\Listings\ShowListing;
use Marketplaceful\Http\Livewire\Listings\ShowListings;
use Marketplaceful\Http\Livewire\Tags\CreateTag;
use Marketplaceful\Http\Livewire\Tags\ShowTag;
use Marketplaceful\Http\Livewire\Tags\ShowTags;
use Marketplaceful\Http\Livewire\Users\ShowUser;
use Marketplaceful\Http\Livewire\Users\ShowUsers;
use Marketplaceful\Http\Middleware\Authorize;
use Marketplaceful\Http\Middleware\UpdateUserLastSeenMiddleware;

Route::group(['middleware' => 'web'], function () {
    Route::group(['middleware' => ['auth', 'verified', Authorize::class, UpdateUserLastSeenMiddleware::class]], function () {
        Route::get('/marketplaceful', fn () => redirect()->to(route('marketplaceful::listings.index')))->name('marketplaceful::dashboard');

        Route::get('/marketplaceful/tags', ShowTags::class)->name('marketplaceful::tags.index');
        Route::get('/marketplaceful/tags/create', CreateTag::class)->name('marketplaceful::tags.create');
        Route::get('/marketplaceful/tags/{tag}', ShowTag::class)->name('marketplaceful::tags.show');

        Route::get('/marketplaceful/listings', ShowListings::class)->name('marketplaceful::listings.index');
        Route::get('/marketplaceful/listings/create', CreateListing::class)->name('marketplaceful::listings.create');
        Route::get('/marketplaceful/listings/{listing}', ShowListing::class)->name('marketplaceful::listings.show');

        Route::get('/marketplaceful/users', ShowUsers::class)->name('marketplaceful::users.index');
        Route::get('/marketplaceful/users/{user}', ShowUser::class)->name('marketplaceful::users.show');
    });
});
