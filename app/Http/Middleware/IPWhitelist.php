<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IPWhitelist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
{
    $whitelistedIPs = config('ipwhitelist.ips');

    $ipAddress = $request->ip();

    if (!in_array($ipAddress, $whitelistedIPs)) {
        return redirect()->route('unauthorized');
    }

    return $next($request);
}

}
