<?php

namespace App\Http\Middleware;
use Closure;

class Cros
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', "*")
            ->header('Access-Control-Allow-Methods', "PUT, POST, DELETE, GET, OPTIONS")
            ->header('Access-Control-Allow-Headers', 'Accept, Authorization, Content-Type');
    }
}
