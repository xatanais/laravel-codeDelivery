<?php

namespace codeDelivery\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
		echo "rodou middleare";
        if(!Auth::check()){
            return redirect('/');
        }

        if(Auth::user()->role <> "admin"){
            return redirect('/login');
        }
        return $next($request);
    }
}
