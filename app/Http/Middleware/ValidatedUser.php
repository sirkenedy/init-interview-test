<?php

namespace App\Http\Middleware;

use Closure;

class ValidatedUser
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
        if ($request->session()->has('user_key') && $request->getRequestUri() != "/") {
            return $next($request);
        }

        if ($request->session()->has('user_key') && $request->getRequestUri() == "/") {
            return redirect('/entries');
        }
        
        return redirect('/');
    }
}
