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
    /*
        1 funkcija  suranda vartotoja pagal ID ir grazina ji
        2 funkcija tam vartotojui sukelia
    */

    public function S1()
    {

        $id = Auth::user()->id;
        $user = User::find($id);
        $user->points = $user->points+120;
        $user->save();
        return $user->points;

    }

    public function S2($data)
    {

        $id = $data->id;
        $user = User::find($id);
        $user->points = $user->points+10;
        $user->save();
        return $user->points;

    }
}
