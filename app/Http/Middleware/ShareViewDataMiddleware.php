<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\View;
use App\Category;
use Closure;

class ShareViewDataMiddleware
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
        try{
            $categories = Category::all();
        } catch(\Illuminate\Database\QueryException $e) {
            $categories = [];
        }

        View::share('categories', $categories);

        return $next($request);
    }
}
