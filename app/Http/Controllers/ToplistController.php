<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class ToplistController extends Controller
{

    public function watchTops()
    {

        $users = User::all()->sortBy('points', SORT_REGULAR, true)->take(5);

        $me = Auth::user();
        $rank = User::where('points', '>', $me->points)->count() + 1;
        return view('/home', compact('rank'));
    }
}
