<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use URL;

class Requerant
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
        if($request->user() && $request->user()->requerant_id==false){
            if($request->user()->responsable_id!=null){
                return redirect()->route("home");
            }else{
                Session::put('url.intended', URL::full()); 
                return redirect()->back()->with('login', true);

            }
        }elseif(!$request->user()){
            Session::put('url.intended', URL::full()); 
            return redirect()->route('Accueil')->with('login', true);
        }
        return $next($request);
    }
}
