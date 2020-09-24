<?php

use Marketplaceful\Http\Controllers\ListingController;
use Marketplaceful\Http\Controllers\TagController;
use Marketplaceful\Http\Controllers\UserController;
use Marketplaceful\Http\Livewire\CreateListing;
use Marketplaceful\Http\Livewire\CreateTag;
use Marketplaceful\Http\Livewire\ListingIndex;
use Marketplaceful\Http\Livewire\ShowListing;
use Marketplaceful\Http\Livewire\ShowTag;
use Marketplaceful\Http\Livewire\TagIndex;
use Marketplaceful\Http\Middleware\UpdateUserLastSeenMiddleware;

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth', 'verified', UpdateUserLastSeenMiddleware::class]], function () {
        Route::get('/marketplaceful/tags', [TagController::class, 'index'])->name('marketplaceful::tags.index');
        Route::get('/marketplaceful/tags/create', [TagController::class, 'create'])->name('marketplaceful::tags.create');
        Route::get('/marketplaceful/tags/{tag}', [TagController::class, 'show'])->name('marketplaceful::tags.show');

        Route::get('/marketplaceful/listings', [ListingController::class, 'index'])->name('marketplaceful::listings.index');
        Route::get('/marketplaceful/listings/create', [ListingController::class, 'create'])->name('marketplaceful::listings.create');
        Route::get('/marketplaceful/listings/{listing}', [ListingController::class, 'show'])->name('marketplaceful::listings.show');

        Route::get('/marketplaceful/users', [UserController::class, 'index'])->name('marketplaceful::users.index');
        Route::get('/marketplaceful/users/{user}', [UserController::class, 'show'])->name('marketplaceful::users.show');
    });
});
