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
            dd("Please run `php artisan migrate --seed` to insert necessary data into the db.");
        }

        View::share('categories', $categories);

        return $next($request);
    }
}
