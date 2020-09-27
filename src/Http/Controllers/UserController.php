<?php

namespace Marketplaceful\Http\Controllers;

use Illuminate\Http\Request;

class UserController
{
    public function index()
    {
        /**
         * @psalm-suppress UndefinedMethod
        */
        $activeUsers = config('marketplaceful.user_model')::active()->orderBy('name')->get();
        /**
         * @psalm-suppress UndefinedMethod
        */
        $suspendedUsers = config('marketplaceful.user_model')::suspended()->orderBy('name')->get();

        return view('marketplaceful::users.index', [
            'activeUsers' => $activeUsers,
            'suspendedUsers' => $suspendedUsers,
        ]);
    }

    public function show(Request $request, $userId)
    {
        /**
         * @psalm-suppress UndefinedMethod
        */
        $user = config('auth.providers.users.model')::findOrFail($userId);

        return view('marketplaceful::users.show', [
            'user' => $user,
        ]);
    }
}
