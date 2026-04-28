<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Store new address
     */
    public function store(Request $request) {
        
        $validated = $request->validate([
            'street' => 'required|string|max:255',
            'unit_number' => 'nullable|numeric|max:50',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'zip' => 'required|numeric|max:20',
        ]);

        // Prepared statement
        DB::insert(
            "INSERT INTO addresses (user_id, street, unit_number, city, state, zip)
            VALUES(?, ?, ?, ?, ?, ?)",

            [   
                auth()->user()->id,
                $validated['street'],
                $validated['unit_number'] ?? null,
                $validated['city'],
                $validated['state'],
                $validated['zip'],
            ]

        );

        return redirect()->back()->with('success', 'Address added');

    }
}
