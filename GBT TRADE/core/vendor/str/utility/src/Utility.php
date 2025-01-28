<?php

namespace Laramin\Utility;

use Closure;
use Illuminate\Support\Facades\Cache;

class Utility
{
    public function handle($request, Closure $next)
    {
        if (!Helpmate::sysPass()) {
            return redirect()->route(VugiChugi::acRouter());
        }
        return $next($request);
    }
}
