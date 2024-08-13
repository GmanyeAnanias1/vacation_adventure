<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
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

// Route::get('/',  function () {
//     return view('registration');
// });
Route::get('/', [CourseController::class, 'getCoursesForRegistration']);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/cardGraph', [AdminDashboardController::class, 'card'])->name('admin.cardGraph');
Route::get('/admin/applicant-details/{id}', [AdminDashboardController::class, 'show'])->name('admin.applicants.show');