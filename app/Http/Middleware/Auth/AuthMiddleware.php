<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Authentication Check
        $user = Auth::guard('web')->user();
        if (!$user) {
            return redirect()
                ->route('dashboard.auth.index')
                ->with('error', 'Please login to access this page');
        }

        return $next($request);
    }
}
