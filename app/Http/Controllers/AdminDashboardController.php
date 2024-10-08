<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Registration;


class AdminDashboardController extends Controller
{
    
    public function card(){
        $registrations = Registration::all();
        $courses = Course::all();
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
        return view('admin.cardGraph', compact('registrations','registrationsByMonth','courses'));
    }


    public function show($id) {
        // Fetch the registration details by ID
        $registration = Registration::findOrFail($id);

        // Pass the registration data to the view
        return view('admin.applicant-details', compact('registration'));
    }

}