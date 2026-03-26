<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Skip verification for administrators or unauthenticated Guests 
        if ($user && $user instanceof \App\Models\User && !$user->email_verified_at && 
            !$request->routeIs('verification.notice', 'otp.send', 'otp.verify', 'otp.verify.submit', 'logout')) {
            return redirect()->route('verification.notice');
        }

        return $next($request);
    }
}
