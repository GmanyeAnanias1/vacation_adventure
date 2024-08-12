<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Carbon\Carbon;


class AdminDashboardController extends Controller
{
    public function index() {
        $registrations = Registration::all(); // Fetch all registrations from the database

        return view('admin.dashboard', compact('registrations'));

    }

    public function card(){
        $registrations = Registration::all();

        // Group registrations by month
        $registrationsByMonth = $registrations->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->start_date)->format('F'); // Group by month name
        })->map->count(); // Count the number of registrations per month

        // List of all months
        $months = collect([
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ]);

        // Ensure all months are included in the dataset, even if there are no registrations
        $registrationsByMonth = $months->mapWithKeys(function ($month) use ($registrationsByMonth) {
            return [$month => $registrationsByMonth->get($month, 0)];
        });

        // Return the data to the view
        return view('admin.cardGraph', compact('registrations','registrationsByMonth'));
    }


    public function show($id) {
        // Fetch the registration details by ID
        $registration = Registration::findOrFail($id);

        // Pass the registration data to the view
        return view('admin.applicant-details', compact('registration'));
    }

}