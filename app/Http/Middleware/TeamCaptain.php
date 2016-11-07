<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use Session;

class TeamCaptain
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
        $team = Team::find($teamId);

        if (Auth::user()->id != $team->captain)
        {
            Session::flash('error-message', "Nesate šios komandos kapitonas!");
            return redirect()->back();
        }

        return $next($request);
    }
}
