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
/*        if (Auth::User()->flat_id == null) {
            return redirect()->to('/register/wg');
        } elseif (Auth::User()->flat_id != null){
            return redirect()->to('/home');
        }*/

        if ($request->user()->flat_id == null){
            return redirect()->to('/register/wg');
        } /*elseif ( $request->user()->flat_id != null ) {
            return redirect()->to('/home');
        }*/
        return $next($request);
    }
}
