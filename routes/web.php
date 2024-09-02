<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CPLController;
use App\Http\Controllers\CPMKController;
use App\Http\Controllers\CourseController;
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

// Login
Route::get('/login', [AppController::class, 'viewlogin'])->name('viewlogin');
Route::post('/login', [AppController::class, 'login'])->name('login');

// Dashboard
Route::get('/dashboard', [AppController::class, 'index'])->name('dashboard');

// CPL
Route::controller(CPLController::class)->group(function () {
  Route::get('/cpl', 'index')->name('cpl.index');
  Route::post('/cpl', 'store')->name('cpl.store');
  // Route::delete('/cpl/{kodecpl}', 'destroy')->name('cpl.destroy');
});

// CPMK
Route::controller(CPMKController::class)->group(function () {
  Route::get('/cpmk', 'index')->name('cpmk.index');
  Route::post('/cpmk', 'store')->name('cpmk.store');
  // Route::delete('/cpl/{kodecpl}', 'destroy')->name('cpl.destroy');
});

// Course
Route::controller(CourseController::class)->group(function () {
  Route::get('/mk', 'index')->name('mk.index');
  Route::post('/mk', 'store')->name('mk.store');
  // Route::delete('/cpl/{kodecpl}', 'destroy')->name('cpl.destroy');
});


