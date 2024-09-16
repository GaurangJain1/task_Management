<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if(Auth::check()->role === 'Assioner'){
            return $next($request);
        }
        elseif(Auth::check()->role === 'Assignee'){
            return $next($request);
        }
        else{
            return redirect()->route("login");
            // return view('login');
        }
    }
    // Assignee
}
