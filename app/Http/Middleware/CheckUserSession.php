<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckUserSession
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('userId') || Session::get('userId') === null) {
            return redirect()->route('auth.login');
        }

        return $next($request);
    }
}
