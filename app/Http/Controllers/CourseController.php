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
            $code = strtoupper(substr(uniqid(), -10)); // Generate a 6-character code
        } while (Course::where('course_code', $code)->exists());

        return $code;
    }

   public function addCourse(){
   return view('admin.addCourse');
   }

   public function index()
{
    $courses = Course::all(); // Fetch all courses from the database
    return view('admin.courses', compact('courses')); // Pass the data to the view
}

// Method to handle course editing
public function editCourse(Request $request, $id)
{
    // Validate the request data
    $validatedData = $request->validate([
        'course_name' => 'required|string|max:60',
        'course_code' => 'required|string|max:10|unique:courses,course_code,' . $id . ',id',
    ]);

    // Find the course by its ID
    $course = Course::findOrFail($id);

    // Update the course fields
    $course->course_name = $validatedData['course_name'];
    $course->course_code = $validatedData['course_code'];
    $course->modifyuser = auth()->user()->name ?? 'admin';
    $course->modifydate = now();

    // Save the updated course
    $course->save();

    // Return a success response
    return response()->json(['message' => 'Course updated successfully']);
}

public function destroy($id)
{
    $course = Course::findOrFail($id);
    $course->delete();
    return response()->json(['message' => 'Course deleted successfully']);
}


}