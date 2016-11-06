<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Session;

class TeamMember
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
        $teamId = $request->id;
        if (Auth::user()->team != $teamId)
        {
            Session::flash('error-message', "Nesate šios komandos narys!");
            return redirect()->back();
        }

        return $next($request);
    }
}
