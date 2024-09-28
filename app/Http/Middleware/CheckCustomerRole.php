<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckCustomerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has the 'customer' role
            if (Auth::user()->usertype === 'customer') {
                return $next($request); // Allow the request to proceed
            }
        }

        // If not a customer, redirect to home with an unauthorized message
        return redirect()->route('home')->with('error', 'Unauthorized access. Only customers can book cars.');

    }
}
