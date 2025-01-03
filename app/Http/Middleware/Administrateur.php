<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class Administrateur
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
        if(!Auth::check()){
            return redirect()->route('login');
        }
        if($request->user() &&  !$request->user()->caidp==true){
            if($request->user()->responsable_id!=null){
                return redirect()->route("responsable.home");
            }else{
                return redirect()->route('requerant.index');

            }
        }
        return $next($request);
    }
}
