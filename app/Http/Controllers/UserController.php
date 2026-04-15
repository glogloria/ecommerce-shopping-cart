<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display form to create new user
     */
    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        return 'Hello';
    }
}
