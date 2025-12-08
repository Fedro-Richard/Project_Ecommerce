<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if user has admin role
        if (Auth::user()->role !== 'admin') {
            // Optional: Redirect to home with error, or showing 403
            return redirect()->route('home')->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
}
