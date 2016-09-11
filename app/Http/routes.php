<?php

use App\User;
use App\Renginys;
use App\Task;
use App\Upload;

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
    if (Auth::user()) {
        return view('home');
    }
    else {
        return view('welcome');
    }

});

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::post('ideti', 'UploadController@ideti');
Route::post('prideti_uzduoti', 'AdminController@prideti_uzduoti');
Route::post('patvirtinti', 'AdminController@patvirtinti');
Route::post('decline', 'AdminController@decline');
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


//Route kontaktai puslapiui
Route::get('kontaktai', array('as'=>'kontaktai', 'uses'=> function(){
    return view('kontaktai');
}));

Route::get('informacija', array('as'=>'renginys', 'uses'=> function(){
    $renginys=Renginys::all();
    return view('/informacija', compact('renginys'));
}));

Route::get('uzduotys', array('as'=>'tasks', 'uses'=> function(){
    //$tasks=Task::all()->where('vartotojas', Auth::user()->facebook_id);
    $tasks=Task::all()->where('vartotojas', Auth::user()->facebook_id)->where('busena', '0');
    return view('/uzduotys', compact('tasks'));
}));

Route::get('admin', array('as'=>'upload', 'uses'=> function(){
    $upload=Upload::all()->where('busena','0');
    return view('/admin', compact('upload'));
}));




Route::get('/listing', function(){

    $users = User::all()->sortBy('points', SORT_REGULAR, true)->take(20);

    return view('/listing', compact('users'));
});


Route::post('uzduotys', array(
    'as'=> 'uzduotys',
    function(){
        return Input::All();
    }
));

Route::get('home', array('as' => 'home', 'uses' => 'ToplistController@watchTops'));


Route::get('/apie-mus', function(){

    $users = User::all();

    return view('/apie-mus', compact('users'));
});
/*
Route::get('apie-mus', array('as'=>'apie-mus', 'uses'=> function(){
    return view('apie-mus');
}));*/