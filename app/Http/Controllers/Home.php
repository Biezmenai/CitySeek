<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index($name)
    {
        return view('home', ["name"=>$name]);

        //return view('home', ['name' => $name ]);
    }
}
