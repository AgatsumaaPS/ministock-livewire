<?php

namespace App\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class Logout
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke(): void
    {
        Auth::guard('web')->logout();

        // Forget the "remember me" recaller cookie to prevent automatic re-login
        $recaller = Auth::getRecallerName();
        if ($recaller) {
            Cookie::queue(Cookie::forget($recaller));
        }

        Session::invalidate();
        Session::regenerateToken();
    }
}
