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
Route::post('ideti', 'UploadController@ideti');
Route::get('padidinti', 'ToplistController@S1');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('home', array('as' => 'home', 'uses' => function(){
    return view('home');
}));
//Route uzduociu puslapiui
Route::get('uzduotys', array('as'=>'uzduotys', 'uses'=> function(){
    return view('uzduotys');
}));
//Route infromacijos puslapiui
Route::get('informacija', array('as'=>'informacija', 'uses'=> function(){
    return view('informacija');
}));
//Route apieMus puslapiui
Route::get('apie-mus', array('as'=>'apie-mus', 'uses'=> function(){
    return view('apie-mus');
}));

//Route kontaktai puslapiui
Route::get('kontaktai', array('as'=>'kontaktai', 'uses'=> function(){
    return view('kontaktai');
}));





Route::get('/listing', function(){

    $users = User::all()->sortBy('points', SORT_REGULAR, true)->take(5);

    return view('/listing', compact('users'));
});

Route::group(array('namespace'=>'Admin'), function()
{
    Route::get('/admin', array('as' => 'admin', 'uses' => 'AdminController@index'));
});

Route::get('home', array('as' => 'home', 'uses' => function(){

    $users = User::all()->sortBy('points', SORT_REGULAR, true)->take(5);

    $me   = Auth::user();
    $rank = User::where('points', '>', $me->points)->count() + 1;
    return view('/home', compact('rank'));
}));