<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminDashboardController;



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
Route::get('/', [AuthController::class, 'LoginForm'])->name('login');
Route::post('/register', [RegistrationController::class, 'submit'])->name('register.submit');


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'userRegistrationForm'])->name('register');
Route::get('/form', [CourseController::class, 'getCoursesForRegistration']);
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/cardGraph', [AdminDashboardController::class, 'card'])->name('admin.cardGraph');
Route::get('/admin/applicant-details/{id}', [AdminDashboardController::class, 'show'])->name('admin.applicants.show');
Route::get('/addCourse', [CourseController::class,'addCourse'])->name('admin.addCourse');
Route::post('/addCourse', [CourseController::class,'storeCourse'])->name('storeCourse');
Route::post('/changePassword', [AuthController::class, 'changePassword'])->name('password.change');
Route::post('/resetPassword', [AuthController::class, 'resetPassword'])->name('resetpassword');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');