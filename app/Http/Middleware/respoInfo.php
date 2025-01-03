<?php

namespace App\Http\Middleware;

use Closure;

class respoInfo
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
        if(!$request->user()->respnsable_id==1){
            return redirect()->route('User.home');
        }
        return $next($request);
    }
}
