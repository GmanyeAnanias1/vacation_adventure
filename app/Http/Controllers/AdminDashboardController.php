<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        $registrations = Registration::all(); // Fetch all registrations from the database

        return view('admin.dashboard', compact('registrations'));
    }
}