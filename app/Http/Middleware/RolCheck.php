<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Log;
use Symfony\Component\HttpFoundation\Response;

class RolCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (in_array(Auth()->user()->rol, $roles)) {
            return $next($request);
        } else {
            //return redirect('/');
            abort(403, 'Acceso no autorizado, vuelve a la página de inicio.');
        }
    }

    
}
