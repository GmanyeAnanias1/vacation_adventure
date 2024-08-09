<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        $registrations = Registration::all(); // Fetch all registrations from the database

        return view('admin.dashboard', compact('registrations'))
        ;
    }



    public function show($id) {
        // Fetch the registration details by ID
        $registration = Registration::findOrFail($id);

        // Pass the registration data to the view
        return view('admin.applicant-details', compact('registration'));
    }

}