<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Closure;

class AdminMiddleware
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
        if($request->user() && $request->user()->rols_fk != '1'){
            return new Response(view('home'));
            //return redirect()->guest(route('admin'));
        }
        //return redirect()->guest(route('admin'));
        return $next($request);
    }
}
