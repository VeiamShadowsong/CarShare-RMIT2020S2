<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! session('admin')) {
            $request->session()->flush();

            return redirect('/admin/login');
        }

        return $next($request);
    }
}
