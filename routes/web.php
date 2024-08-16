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

// Route::get('/',  function () {
//     return view('registration');
// });
Route::post('/userRegister', [AuthController::class, 'userRegister']);
Route::get('/admin/changePassword', [AuthController::class, 'changePasswordForm'])->name('password.change');
Route::get('/resetPasswordForm', [AuthController::class, 'ResetPasswordForm'])->name('password.change');