<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('dashboard'); // landing page
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin (Protected)
|--------------------------------------------------------------------------
*/
Route::get('/admin', function () {
    return view('admin'); // halaman setelah login
})->middleware(['auth', 'verified'])->name('admin');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (login, register, logout)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
