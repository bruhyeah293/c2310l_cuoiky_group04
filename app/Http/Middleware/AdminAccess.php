<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAccess
{
    public function handle($request, Closure $next)
    {
        $guards = ['web', 'member'];

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                if ($user->level == 1) {
                    session(['guard' => $guard]);
                    return $next($request);
                }
            }
        }

        return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập admin.');
    }
}
