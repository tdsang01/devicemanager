<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class IsManager {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (\Auth::check()&& $request->user()->role == 4) {
            return $next($request);
        }
        return new RedirectResponse(url('/home'));
        
    }

}
