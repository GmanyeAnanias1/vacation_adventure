<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class RegistrationController extends Controller
{
    public function index()
    {
        // Fetch registrations by type
        $childrenRegistrations = Registration::where('registration_type', 'children')->get();
        $studentRegistrations = Registration::where('registration_type', 'student')->get();
        $adultRegistrations = Registration::where('registration_type', 'adult')->get();

        // Pass data to the view
        return view('admin.dashboard', [
            'childrenRegistrations' => $childrenRegistrations,
            'studentRegistrations' => $studentRegistrations,
            'adultRegistrations' => $adultRegistrations
        ]);
    }

    public function submit(Request $request)
    {
        // Log incoming request data for debugging
        Log::info('Incoming registration data:', $request->all());

        // Define common validation rules
        $commonRules = [
            'registration_type' => ['required', Rule::in(['children', 'student', 'adult'])],
            'course_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:10',
            'email' => 'required|string|email|max:50',
        ];

        // Define type-specific validation rules
        $typeSpecificRules = $this->getTypeSpecificRules($request->input('registration_type'));

        // Merge common and type-specific validation rules
        $rules = array_merge($commonRules, $typeSpecificRules);

        try {
            // Validate request data
            $validatedData = $request->validate($rules);

            // Create registration record
            Registration::create($validatedData);

            // Return a successful response
            return response()->json(['message' => 'Registration successful', 'ok' => true], 200);
        } catch (ValidationException $e) {
            // Log validation errors for debugging
            Log::error('Validation failed:', $e->errors());

            // Return a response with validation errors
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    // Returns validation rules based on registration type
    private function getTypeSpecificRules($type)
    {
        switch ($type) {
            case 'children':
                return [
                    'parents_name' => 'required|string|max:50',
                    'wards_name' => 'required|string|max:50',
                    'ward_age' => 'required|integer|min:1|max:10',
                    'ward_school' => 'required|string|max:100',
                    'location' => 'required|string|max:100',
                ];

            case 'student':
                return [
                    'first_name' => 'required|string|max:50',
                    'middle_name' => 'nullable|string|max:50',
                    'last_name' => 'required|string|max:50',
                    'school' => 'required|string|max:100',
                    'program' => 'required|string|max:100',
                ];

            case 'adult':
                return [
                    'first_name' => 'required|string|max:50',
                    'middle_name' => 'nullable|string|max:50',
                    'last_name' => 'required|string|max:50',
                    'profession' => 'required|string|max:100',
                    'industry' => 'required|string|max:100',
                ];

            default:
                return [];
        }
    }
}