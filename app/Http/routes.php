<?php

use App\User;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('home', array('as' => 'home', 'uses' => function(){
  return view('home');
}));

Route::post('upload', 'UploadController@upload');

Route::get('/listing', function(){

    $users = User::all()->sortBy('points', SORT_REGULAR, true)->take(5);

    return view('/listing', compact('users'));
});

Route::get('/home', function(){

    $users = User::all()->sortBy('points', SORT_REGULAR, true)->take(5);

    $me   = Auth::user();
    $rank = User::where('points', '>', $me->points)->count() + 1;
    return view('/home', compact('rank'));
});