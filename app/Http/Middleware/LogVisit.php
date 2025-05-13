<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;

class LogVisit
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->is('admin*')) {
            return $next($request);
        }

        Visit::create([
            'path' => $request->path(),
            'ip' => $request->ip(),
        ]);

        return $next($request);
    }
}

