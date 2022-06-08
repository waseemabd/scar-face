<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class is_admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        dd('zsxdcfvb');
        if (Auth::user() && Auth::user()->role == 1) {
            return $next($request);
        } else {
            return redirect(route('login'))->with('error', 'You  do not have admin access');

        }
    }
}
