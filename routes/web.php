<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentLessonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(LoginController::class)->prefix('/login')->middleware('guest')->group(function() {
    Route::get('/', 'index')->name('login');
    Route::post('/', 'authenticate');
});

Route::controller(RegisterController::class)->prefix('/register')->middleware('guest')->group(function() {
    Route::get('/', 'index')->name('register');
    Route::post('/', 'store');
});

Route::controller(DashboardController::class)->middleware('auth')->group(function() {
    Route::get('/', 'index');
    Route::get('/logout', 'logout');
});

Route::controller(FacultyController::class)->prefix('/faculty')->middleware('auth')->group(function() {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::patch('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(MajorController::class)->prefix('/major')->middleware('auth')->group(function() {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::patch('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(LessonController::class)->prefix('/lesson')->middleware('auth')->group(function() {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::patch('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(StudentController::class)->prefix('/student')->middleware('auth')->group(function() {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::patch('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(ProfileController::class)->prefix('/profile')->middleware('auth')->group(function() {
    Route::get('/', 'index');
    Route::get('/edit', 'edit');
    Route::patch('/update', 'update');
});

Route::controller(UserController::class)->prefix('/user')->middleware(['auth', 'isSA'])->group(function() {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::patch('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'destroy');
});

Route::controller(StudentLessonController::class)->prefix('/stuless')->middleware('auth')->group(function() {
    Route::get('/', 'index');
    Route::get('/{id}/{sem?}', 'show');
    Route::get('/edit/{id}/{sem}', 'edit');
    Route::patch('/update/{id}/{sem}', 'update');
});
