<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class MemberAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('member')->check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập trước.');
        }

        return $next($request);
    }

}
