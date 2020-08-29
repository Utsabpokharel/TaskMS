<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class roleFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!(Auth::user()->roles->name == 'super_admin' || Auth::user()->roles->name == 'admin' || Auth::user()->roles->name == 'employee')) {
            return redirect()->route('index')->with('warning', 'Sorry You are not authorized to view the Admin page');
        }

        if ((Auth::user()->roles->name == 'super_admin' || Auth::user()->roles->name == 'admin' || Auth::user()->roles->name == 'employee')) {
            return $next($request);
        } else {
            return redirect()->route('index')->with('warning', 'Sorry You are not authorized to view the Admin page');
        }
    }
}
