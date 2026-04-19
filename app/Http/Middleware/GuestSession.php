<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestSession
{
    public function handle(Request $request, Closure $next)
    {
        if (session('refresh_token')) {
            return redirect()->route('master-tutorial');
        }

        return $next($request);
    }
}