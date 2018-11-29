<?php

namespace App\Http\Middleware;

use Closure;

class isGuest
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
        if ( loggedIn() ) return redirect('/');
        
        return $next($request);
    }
}
