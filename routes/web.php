<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // Pending Approval Route
    Route::get('/pending-approval', function () {
        if (auth()->user()->status === 'active' || auth()->user()->isAdmin()) {
            return redirect()->intended(auth()->user()->isAdmin() ? route('dashboard') : route('user.dashboard'));
        }
        return view('livewire.auth.pending-approval');
    })->name('pending.approval');

    Route::middleware(['status.check'])->group(function () {
        Route::get('/user/dashboard', function () {
            if (auth()->user()->isAdmin()) {
                return redirect()->route('dashboard');
            }
            return view('user.dashboard');
        })->name('user.dashboard');
    });
});

/*
|--------------------------------------------------------------------------
| Dashboard (Admin Only)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    if (!auth()->check()) {
        return redirect()->route('login');
    }
    
    if (!auth()->user()->is_admin) {
        abort(403, 'Akses hanya untuk admin.');
    }
    
    // Get stats for dashboard
    $totalProducts = \App\Models\Product::count();
    $totalCategories = \App\Models\Category::count();
    $lowStockCount = \App\Models\Product::where('stock', '<=', 5)->where('stock', '>', 0)->count();
    $outOfStockCount = \App\Models\Product::where('stock', 0)->count();
    $totalStock = \App\Models\Product::sum('stock');
    $recentProducts = \App\Models\Product::with('category')->latest()->take(5)->get();
    $pendingUsers = \App\Models\User::where('is_admin', false)->count();
    
    // Recent Activity Logs
    $recentActivity = \App\Models\ActivityLog::with('user')->latest()->take(5)->get();
    
    return view('dashboard', compact(
        'totalProducts',
        'totalCategories', 
        'lowStockCount',
        'outOfStockCount',
        'totalStock',
        'recentProducts',
        'pendingUsers',
        'recentActivity'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Admin Routes (Products & Categories)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', \App\Http\Middleware\AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Products CRUD
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except(['show']);
        
        // Categories CRUD
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
        
        // Users Management
        Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
        Route::post('users/{user}/approve', [\App\Http\Controllers\Admin\UserController::class, 'approve'])->name('users.approve');
        Route::post('users/{user}/revoke', [\App\Http\Controllers\Admin\UserController::class, 'revoke'])->name('users.revoke');
        Route::delete('users/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('users.destroy');

        // Activity Logs
        Route::get('logs', [\App\Http\Controllers\Admin\LogController::class, 'index'])->name('logs.index');
        Route::get('logs/{log}', [\App\Http\Controllers\Admin\LogController::class, 'show'])->name('logs.show');
    });

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
require __DIR__ . '/auth.php';
