<?php

namespace App\Http\Middleware;

use Closure;

class UserLoggedIn
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
        if (! session('user')) {
            $request->session()->flush();

            return redirect('/login');
        }

        return $next($request);
    }
}
