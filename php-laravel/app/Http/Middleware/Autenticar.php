<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autenticar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->is('entrar', 'registrar') && !Auth::check()) {
            return redirect('/entrar');
        } else if ($request->is('entrar', 'registrar') && Auth::check()) {
            return redirect('/series');
        }

//        if (!Auth::check()) {
//            return redirect('/entrar');
//        }

        return $next($request);
    }
}
