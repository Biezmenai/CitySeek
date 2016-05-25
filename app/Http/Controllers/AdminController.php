<?php

namespace App\Http\Controllers;

use \Input as Input;
use App\User;
use Auth;
use DB;

class AdminController extends Controller
{

    public function prideti_uzduoti()
    {
        //echo $callback;
        echo '<a href="/home">grizti</a>';

        $users=DB::table('users')->get();

        foreach ($users as $user) {
            DB::table('tasks')->insert([

                ['rusis' => Input::get('rusis'), 'pavadinimas' => Input::get('pavadinimas'),
                    'aprasymas' => Input::get('aprasymas'), 'taskai' => Input::get('taskai'),
                    'vartotojas' => $user->facebook_id, 'busena' => '0'
                ]

            ]);
        }
    }

    public function patvirtinti()
    {
        echo '<a href="/admin">grizti</a>';
        DB::table('uploads')
            -> where('id', Input::get("id"))
            -> update(['busena' => 1]);
;
        DB::table('users')
            -> where('facebook_id', Input::get("userid"))
            -> update(['points' => '1']);
    }


}
