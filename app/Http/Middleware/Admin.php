<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class Admin
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
        if (!Auth::user())
        {
            Session::flash('error-message', "Norėdami pasiekti šį puslapį - prisijunkite!");
            return redirect('/');
        }
        else if (Auth::user() && Auth::user()->accesslevel < 1) {
            Session::flash('error-message', "Nelįsk kur nereikia!");
            return redirect('/');
        }

        return $next($request);
    }
}
