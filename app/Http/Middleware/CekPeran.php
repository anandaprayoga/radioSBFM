<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CekPeran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $peran
     * @return mixed
     */
    public function handle($request, Closure $next, $peran)
    {
        if (Auth::check() && Auth::user()->peran === $peran) {
            return $next($request);
        }

        return redirect()->route('dashboard')->with('error', 'You do not have access to this page.');
    }
}
