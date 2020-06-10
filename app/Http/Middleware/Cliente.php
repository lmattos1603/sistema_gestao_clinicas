<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Cliente
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
        if(! Auth::user()->ehCliente()){
            return back();
        }

        return $next($request);
    }
}
