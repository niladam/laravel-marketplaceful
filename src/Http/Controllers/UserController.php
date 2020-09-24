<?php

namespace Marketplaceful\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $activeUsers = User::active()->orderBy('name')->get();
        $suspendedUsers = User::suspended()->orderBy('name')->get();

        return view('marketplaceful::users.index', [
            'activeUsers' => $activeUsers,
            'suspendedUsers' => $suspendedUsers,
        ]);
    }

    public function show(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        return view('marketplaceful::users.show', [
            'user' => $user,
        ]);
    }
}
