<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use auth;

class HealthcareMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // تحقق من تسجيل دخول المستخدم
        if (auth()->check()) {
            // تحقق من نوع المستخدم
            if (auth()->user()->type === 'hospital') {
                return $next($request);
            }
        }

        // إعادة التوجيه إلى صفحة تسجيل الدخول
        return redirect()->route('healthcare.login')->with('error', 'You must be a hospital to access this page.');
    }
}
