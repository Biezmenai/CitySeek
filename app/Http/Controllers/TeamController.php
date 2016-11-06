<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use DB;
use Auth;
use Input;
use Session;
use Redirect;
use Request;
use Validator;
use Image;
class TeamController extends Controller
{

    public function createNewTeam()
    {
        $validator = Validator::make(Input::all(),
            [
                'name' => 'required|min:3|max:100',
                'img' => 'mimes:jpeg,bmp,png'
            ]
        );

        if ($validator->fails())
        {
            Session::flash('error-message', 'Klaida pildant duomenis');
            return redirect()->back();
        }

        $team = new Team;
        $team->name = Input::get('name');
        $team->captain = Auth::user()->id;
        $team->members_count = 1;
        $team->secret = str_random(10);
        $team->save();
        if (Input::hasFile('img'))
        {
            if (Input::file('img')->isValid())
            {
                Input::file('img')->move("uploads/team-logo", $team->id);
                $img = Image::make("uploads/team-logo/".$team->id);
                $img->resize(106, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save("uploads/team-logo/".$team->id);
                $team->image = "uploads/team-logo/".$team->id;
            }
            else {
                Session::flash('error-message', 'Klaida įkeliant nuotrauką');
                return redirect()->back();
            }
        } else {
            $team->image = "images/thumbs/default-team.png";
        }
        $team->save();

        $user = User::find(Auth::user()->id);
        $user->team = $team->id;
        $user->save();

        Session::flash('success-message', 'Sėkmingai sukūrėte komandą');
        return redirect()->back();
    }

    public function joinTeam()
    {
        $team = Team::where('secret', '=', Input::get('secret'))->first();

        if (!empty($team)) {
            $user = User::find(Auth::user()->id);
            $user->team = $team->id;
            $user->save();

            Session::flash('success-message', "Prisijungėte prie komandos $team->name");
            return redirect()->back();
        }
        else {
            Session::flash('error-message', "Tokios komandos nėra");
            return redirect()->back();
        }

    }

    public function viewTeam($id)
    {
        $team = Team::find($id);

        return $team;

    }
}

