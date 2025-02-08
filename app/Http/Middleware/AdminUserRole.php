<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class AdminUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if the user is authenticated and has the role of 23
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request); // Allow the request to proceed
        }
        // Redirect or abort if the role is not found
        return redirect('/home'); // Or use abort(403) to show a "Forbidden" page
    }
}
