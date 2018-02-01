<?php

namespace App\Http\Middleware;

use Closure;

class CobaMiddleware
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
        if($request->coba=='coba'){
            echo $request->coba;
        }
        return $next($request);
    }
}
