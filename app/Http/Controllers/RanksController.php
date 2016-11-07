<?php

namespace App\Http\Controllers;

use App\Rank;
use DB;
use Auth;
use Input;
use Session;
use Redirect;

class RanksController extends Controller
{

    public function ranksView()
    {
        $ranks = Rank::all();

        return view('admin-views/ranks', compact('ranks'));
    }

    public function deleteRank($id)
    {
        $rank = Rank::find($id);
        $rank->delete();
        Session::flash('success-message', 'Rankas ištrintas');
        return Redirect::back();
    }

    public function editRankView($id)
    {
        $rank= Rank::find($id);
        return view('admin-views/edit-rank', compact('rank'));
    }

    public function editRankSubmit($id)
    {
        $rank= Rank::find($id);
        $rank->rank = Input::get('rank');
        $rank->start_score = Input::get('start_score');
        $rank->end_score = Input::get('end_score');
        $rank->save();

        Session::flash('success-message', 'Rankas atnaujintas');
        return Redirect::back();
    }
}

