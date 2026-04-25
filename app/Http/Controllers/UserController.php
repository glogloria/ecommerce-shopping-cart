<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display form to create new user
     */
    public function register(Request $request) {

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255|unique:users, email',
        'password' => 'required|string|max:255'
    ]);

    $password = Hash::make($validated['password']);

    DB::insert(
        "INSERT INTO users (name, email, password, role)
        VALUES (?, ?, ?, ?)",
        [
            $validated['name'],
            $validated['email'],
            $validated['password'],
            'customer'
        ]
    );
        return response()->json(['success' => true]);
    }
}
