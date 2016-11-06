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
        try {
            $team->name = Input::get('name');
            $team->save();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('error-message', 'Komanda tokiu vardu jau yra. Pasirinkite kitą');
            return redirect()->back();
        }
        $team->captain = Auth::user()->id;
        $team->members_count = 1;
        $generatingSecretFailed = true;
        while($generatingSecretFailed == true) {
            try {
                $team->secret = str_random(10);
                $team->save();
                $generatingSecretFailed = false;
            } catch (\Illuminate\Database\QueryException $e) { /// If not unique secret is generated - retry
                $generatingSecretFailed = true;
            }
        }
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
                $team->image = "/uploads/team-logo/".$team->id;
            }
            else {
                Session::flash('error-message', 'Klaida įkeliant nuotrauką');
                return redirect()->back();
            }
        } else {
            $team->image = "/images/thumbs/default-team.png";
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
            if ($team->members_count < 5) {
                $user = User::find(Auth::user()->id);
                $user->team = $team->id;
                $user->save();
                $team->members_count++;
                $team->save();

                Session::flash('success-message', "Prisijungėte prie komandos $team->name");
                return redirect()->back();
            } else {
                Session::flash('error-message', "Komandoje jau yra 5 nariai");
                return redirect()->back();
            }
        }
        else {
            Session::flash('error-message', "Tokios komandos nėra");
            return redirect()->back();
        }

    }

    public function viewTeam($id)
    {
        $team = Team::with("members")->find($id);

        return view('komanda', compact('team'));

    }

    public function viewTeamList()
    {
        $teams = Team::with('members')->get();

        return view('admin-views/teams', compact('teams'));
    }

    public function editTeamView($id)
    {
        $team = Team::with('members')->find($id);

        return view('admin-views/team-edit', compact('team'));
    }

    public function editTeam()
    {
        /*$teams = Team::with('members')->get();

        return view('admin-views/team-edit', compact('teams'));*/
    }

    public function deleteTeam($id)
    {
        $team= Team::with('members')->find($id);

        foreach ($team->members as $member) {
            $user = User::find($member->id);
            $user->team = 0;
            $user->save();
        }

        $team->delete();

        Session::flash('success-message', 'Komanda ištrinta');
        return Redirect::back();
    }

    public function deleteMember($id,$memberid)
    {
        $user= User::find($memberid);
        $team=Team::find($user->team);
        $team->members_count--;
        $user->team=0;


        $team->save();
        $user->save();

        Session::flash('success-message', 'Narys ištrintas');
        return Redirect::back();
    }

    public function changeCaptain($id,$memberid)
    {
        $team=Team::find($id);
        $team->captain = $memberid;
        $team->save();

        Session::flash('success-message', 'Komandos kapitonas pakeistas');
        return Redirect::back();
    }

    public function changeSecret($id){

        $team=Team::find($id);
        $generatingSecretFailed = true;
        while($generatingSecretFailed == true) {
            try {
                $team->secret = str_random(10);
                $team->save();
                $generatingSecretFailed = false;
            } catch (\Illuminate\Database\QueryException $e) { /// If not unique secret is generated - retry
                $generatingSecretFailed = true;
            }
        }
        Session::flash('success-message', 'Slaptas kodas buvo pakeistas');
        return Redirect::back();
    }

    public function removeMember($teamId, $memberId)
     {
         $team= Team::find($teamId);
         if ($memberId == $team->captain) {
             Session::flash('error-message', 'Kapitono negalima pašalinti');
             return Redirect::back();
         } else {
                $user = User::find($memberId);
                $user->team = 0;
                $user->save();

                $team->members_count--;
                $team->save();

                Session::flash('success-message', 'Vartotojas pašalintas iš komandos');
                return Redirect::back();
         }
    }

    public function updateTeam($id)
    {
        $team= Team::find($id);

        try {
            $team->name = Input::get('name');
            $team->save();
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('error-message', 'Komanda tokiu vardu jau yra. Pasirinkite kitą');
            return redirect()->back();
        }

        $validator = Validator::make(Input::all(),
            [
                'img' => 'mimes:jpeg,bmp,png'
            ]
        );

        if ($validator->fails())
        {
            Session::flash('error-message', 'Įkelta ne nuotrauka');
            return redirect()->back();
        }

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
                    $team->image = "/uploads/team-logo/".$team->id;
                    $team->save();
                }
                else {
                    Session::flash('error-message', 'Klaida įkeliant nuotrauką');
                    return redirect()->back();
                }
        }

        Session::flash('success-message', 'Komandos informacija atnaujinta');
        return Redirect::back();
    }
}

