<?php

namespace App\Http\Middleware;

use Closure;
use App\Cliente;

class ClienteLogin
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
        if(! session()->has('email')){
            return back();  
        }
        
        return $next($request);
    }
}
