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
        if (auth()->user()->role == 'user') {
            if ($request->user()->flat_id == null){
                return redirect()->to('/wg/register');
            }
            return $next($request);
        } else {
            return redirect()->to('/admin');
        }

    }
}
