<?php

namespace App\Http\Controllers;

use DB;
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
    public function storeCourse(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:60',
        ]);

        // Generate a unique course code
        $courseCode = $this->generateUniqueCourseCode();

        $course = Course::create([
            'trans_id' => uniqid(),
            'course_code' => $courseCode,
            'course_name' => $request->course_name,
            'deleted' => false,
            'createuser' => auth()->user()->name ?? 'admin',
            'createdate' => now(),
            'modifyuser' => auth()->user()->name ?? 'admin',
            'modifydate' => now(),
        ]);

        return response()->json(['message' => 'Course added successfully', 'course_code' => $courseCode]);
    }

    private function generateUniqueCourseCode()
    {
        do {
            $code = strtoupper(substr(uniqid(), -6)); // Generate a 6-character code
        } while (Course::where('course_code', $code)->exists());

        return $code;
    }

   public function addCourse(){
   return view('admin.addCourse');
   }

}