<?php

namespace App\Http\Middleware;

use Closure;

class hasNoFlat
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
        if ( $request->user()->flat_id != null ) {
            return redirect()->to('/home');
        }
        return $next($request);
    }
}
