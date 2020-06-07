<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Profissional
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
        if(! Auth::user()->ehProfissional()){
            session([
                'mensagem' => 'Você não tem permissão para realizar essa tarefa!'
            ]);
            return back();
        }

        return $next($request);
    }
}
