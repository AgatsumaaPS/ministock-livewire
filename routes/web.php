<?php
use App\Livewire\ProductManager;
use Illuminate\Support\Facades\Route;

Route::get('/', ProductManager::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
