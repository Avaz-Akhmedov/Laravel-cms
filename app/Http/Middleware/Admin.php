<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{

    public function handle(Request $request, Closure $next)
    {
        abort_if(auth()->user()->is_admin == 0,403);
        return $next($request);
    }
}
