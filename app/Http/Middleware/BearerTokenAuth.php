<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;

class BearerTokenAuth
{
    public function handle($request, Closure $next)
    {
        if (!Cache::has('auth_user')) {
            return response()->view('login');
        }
        return $next($request);
    }
}