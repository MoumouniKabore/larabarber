<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if (Auth::check() || (Auth::user()->is_admin == true || Auth::user()->is_admin == false)) {
            return $next($request); // On laisse passer la requête à la couche suivante
        } else {
            abort(403, 'Unauthorised Access');
        }
    }
}
