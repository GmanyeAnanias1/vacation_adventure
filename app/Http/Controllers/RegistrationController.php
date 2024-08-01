<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'parents_name' => 'required|string|max: 50',
            'wards_name' => 'required|string|max:05',
            'ward_age' => 'required|integer|min:1',
            'ward_school' => 'required|string|max:70',
            'location' => 'required|string|max:70 ',
            'phone_number' => 'required|string|max:10',
            'email' => 'required|email|max:70',
        ]);

        // Process the data (e.g., save to the database, send an email, etc.)

        // Redirect or return a response
        return back()->with('success', 'Registration completed successfully!');
    }
}