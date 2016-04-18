<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getIndex(){
        return view('welcome');
    }

    public function getAbout(){
        $companyName = "BIEZMENAI";
        $isUserRegistered = false;

        $users = array("Linas", "Lukas", "Darius", "Kristupas");

        return view('pages.about')->
        with("companyName", $companyName)->
        with("isUserRegistered", $isUserRegistered)->
        with("users", $users);
    }

    public function getContact(){
        return view('pages.contact');
    }


}