namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
{
public function submit(Request $request)
{
// Validate common fields
$validatedData = $request->validate([
'registration_type' => ['required', Rule::in(['children', 'student', 'adult'])],
'course_name' => 'required|string|max:100',
]);

// Validate type-specific fields and merge the results
switch ($request->registration_type) {
case 'children':
$validatedData = array_merge($validatedData, $this->validateChildren($request));
break;
case 'student':
$validatedData = array_merge($validatedData, $this->validateStudent($request));
break;
case 'adult':
$validatedData = array_merge($validatedData, $this->validateAdult($request));
break;
}

// Create registration
Registration::create($validatedData);

return response()->json(['message' => 'Registration successful', 'ok' => true], 200);
}

// Children fields
private function validateChildren(Request $request)
{
return $request->validate([
'parents_name' => 'required|string|max:50',
'wards_name' => 'required|string|max:50',
'ward_age' => 'required|integer|min:1|max:10',
'ward_school' => 'required|string|max:100',
'location' => 'required|string|max:100',
'phone_number' => 'required|int|max:10',
'email' => 'required|unique|email|max:50',
]);
}

// Students fields
private function validateStudent(Request $request)
{
return $request->validate([
'first_name' => 'required|string|max:50',
'middle_name' => 'nullable|string|max:50',
'last_name' => 'required|string|max:50',
'email' => 'required|string|email|max:50',
'phone_number' => 'required|string|max:10',
'school' => 'required|string|max:100',
'program' => 'required|string|max:100',
]);
}

// Adults fields
private function validateAdult(Request $request)
{
return $request->validate([
'first_name' => 'required|string|max:50',
'middle_name' => 'nullable|string|max:50',
'last_name' => 'required|string|max:50',
'email' => 'required|string|email|max:50',
'phone_number' => 'required|string|max:10',
'profession' => 'required|string|max:100',
'industry' => 'required|string|max:100',
]);
}
}