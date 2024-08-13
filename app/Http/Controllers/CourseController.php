<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getCoursesForRegistration()
    {
        // Fetch all courses from the database
        $courses = Course::all();

        // Return the registration view with courses data
        return view('registration', compact('courses'));
    }
}