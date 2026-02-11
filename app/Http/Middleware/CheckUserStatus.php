<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Admin is always allowed
            if (Auth::user()->isAdmin()) {
                return $next($request);
            }

            // Check if user status is pending
            if (Auth::user()->status === 'pending') {
                // If the user is already on the pending approval page, proceed
                if ($request->routeIs('pending.approval')) {
                    return $next($request);
                }
                
                // Otherwise redirect to pending approval page
                return redirect()->route('pending.approval');
            }
        }

        return $next($request);
    }
}
