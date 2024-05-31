<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        // dd($request->user()->role_id, $roles);
        if ($request->user() && in_array($request->user()->role_id, $roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
