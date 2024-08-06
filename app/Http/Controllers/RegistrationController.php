<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'parents_name' => 'required|string|max:50',
            'wards_name' => 'required|string|max:50',
            'ward_age' => 'required|integer|min:1|max:10',
            'ward_school' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'phone_number' => 'required|string|max:10',
            'email' => 'required|string|email|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        Registration::create($validatedData);

        return response()->json(['message' => 'Registration successful', 'ok' => true], 200);
    }
}