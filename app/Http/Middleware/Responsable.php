<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Responsable
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
                // dd(Auth::user());
        if($request->user()->responsable_id==false){
            if($request->user()->requerant_id!=null){
                return redirect()->route("requerant.index");
            }elseif($request->user()->caidp_id!=null){
                return redirect()->route('admin.Home');

            }
        }
        return $next($request);
    }
}
