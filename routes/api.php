<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrationController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::post('/applicant-register', [RegistrationController::class, 'submit'])->name('register.submit');

Route::post('/addCourse', [CourseController::class,'storeCourse'])->name('storeCourse');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
Route::put('/courses/{id}', [CourseController::class, 'editCourse'])->name('courses.edit');

// Route::get('/', [AuthController::class, 'LoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/userRegister', [AuthController::class, 'userRegistrationForm'])->name('register');


// Route::post('/changePassword', [AuthController::class, 'changePassword']);
// Route::get('/changePasswordForm', [AuthController::class, 'changePasswordForm'])->name('password.change');
// Route::get('/resetPasswordForm', [AuthController::class, 'ResetPasswordForm'])->name('password.reset');
Route::post('/resetPassword', [AuthController::class, 'resetPassword'])->name('resetpassword');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');