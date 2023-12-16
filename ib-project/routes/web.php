<?php

use App\Http\Controllers\RolesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('signup', [SignupController::class, 'store'])->middleware('guest');
Route::get('login', [LoginController::class, 'index'])->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->middleware('guest');
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::get('/role', [RolesController::class, 'index'])->middleware('auth');
Route::get('/role/edit/{user:id}', [RolesController::class, 'edit'])->middleware('auth');
Route::patch('/role/update/{user:id}', [RolesController::class, 'update'])->middleware('auth');


Route::get('/home', function () {
    return view('home');
});
Route::get('/twofactor', function () {
    return view('twofactor');
});
Route::get('verify/resend', [TwoFactorController::class, 'resend'])->name('verify.resend');
Route::resource('verify', 'App\Http\Controllers\TwoFactorController')->only(['index', 'store']);

Route::get('/student', [StudentController::class, 'index'])->middleware('auth');
Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
