<?php
<<<<<<< HEAD

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

Route::get('/home', function () {
    return redirect()->route('login');
})->name('home');
=======
use App\Livewire\ProductManager;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductManager::class);
>>>>>>> 9c48dd41e66a10a08a044f371e7df927a2a92f09

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
