<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // تحقق إذا كان المستخدم مسجلاً
        if (Auth::check()) {
            // تحقق إذا كان المستخدم Admin
            if (Auth::user()->isAdmin == 1) {
                return $next($request);
            } else {
                return response()->json(['message' => 'You are not allowed'], 403);
            }
        }

        return redirect('login');
    }
}
