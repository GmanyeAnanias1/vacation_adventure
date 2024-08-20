<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/test',"register");
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');
// Route::redirect('/','/api/main-dashboad');
Route::get('/', [AuthController::class, 'LoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'userRegistrationForm'])->name('register');
Route::get('/form', [CourseController::class, 'getCoursesForRegistration']);
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/main-dashboard', [AdminDashboardController::class, 'card'])->name('admin.cardGraph');
Route::get('/admin/applicant-details/{id}', [AdminDashboardController::class, 'show'])->name('admin.applicants.show');
Route::get('/addCourse', [CourseController::class,'addCourse'])->name('admin.addCourse');
Route::post('/addCourse', [CourseController::class,'storeCourse'])->name('storeCourse');
Route::post('/changePassword', [AuthController::class, 'changePassword']);
Route::get('/changePasswordForm', [AuthController::class, 'changePasswordForm'])->name('password.change');
Route::get('/resetPasswordForm', [AuthController::class, 'ResetPasswordForm'])->name('password.reset');
Route::post('/resetPassword', [AuthController::class, 'resetPassword'])->name('resetpassword');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::post('/userRegister', [AuthController::class, 'userRegister']);