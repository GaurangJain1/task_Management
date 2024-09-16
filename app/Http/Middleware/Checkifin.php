<?php

namespace App\Http\Middleware;
// use Illuminate\Support\Facades\url;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Checkifin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // return $next($request);
        if(Auth::check()){
            // redirect(url()->current()) ;
            return Url::current();
            
        }
        else{
            return $next($request);
            // return url()->current();
            // return view('login');
        }
    }
}
