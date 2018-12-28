<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class hasFlat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if (Auth::User()->flat_id == null) {
            return redirect()->to('/register/wg');
        }
        return $next($request);
    }

    /*    public function handle($request, Closure $next)
        {
            return $next($request);
        }*/
}
