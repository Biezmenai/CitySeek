<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class Authenticate
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

        return $next($request);
    }
}
