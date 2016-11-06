<?php

use App\User;
use App\Renginys;
use App\Task;
use App\Upload;
use App\News;
use App\Team;
use Carbon\Carbon;

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
Carbon::setLocale('lt');

Route::get('/', function () {
    $news = News::orderBy('news.created_at', SORT_DESC, true)->paginate(3);
    if (Auth::user()) {
        $team = Team::where('id', '=', Auth::user()->team)->first();
        return view('home', compact('news', 'team'));
    }
    else {
        return view('welcome', compact('news'));    }
});

Route::get('home', array('as'=>'home', 'uses' => function(){
    $news = News::orderBy('news.created_at', SORT_DESC, true)->paginate(3);
    if (Auth::user()) {
        $team = Team::where('id', '=', Auth::user()->team)->first();
        return view('home', compact('news', 'team'));
    }
    else {
        return view('welcome', compact('news'));    }
}));


Route::get('color/{color}', function($color){
        return redirect('/')->withCookie(cookie()->forever('cityseek_color', $color));
});

Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::post('ideti', 'UploadController@ideti');
Route::post('prideti_uzduoti', 'AdminController@prideti_uzduoti');
Route::post('patvirtinti', 'AdminController@patvirtinti');
Route::post('decline', 'AdminController@decline');
Route::get('padidinti', 'ToplistController@S1');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');
Route::get('logout', 'Auth\AuthController@getLogout');

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

/*Route::get('admin', array('as'=>'upload', 'uses'=> function(){
    $upload=Upload::all()->where('busena','0');
    return view('/admin', compact('upload'));
}));*/




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

Route::get('/apie-mus', function(){
    $users = User::all();
    return view('/apie-mus', compact('users'));
});


/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------*/

/* Team routes */
Route::post('create-team', ['middleware' => 'auth', 'uses' => 'TeamController@createNewTeam']);
Route::post('join-team', ['middleware' => 'auth', 'uses' => 'TeamController@joinTeam']);

Route::get('komanda/{id}', ['middleware' => 'auth', 'middleware' => 'team', 'uses' => 'TeamController@viewTeam']);

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------*/
Route::get('admin', ['middleware' => 'admin', function(){
    $upload = Upload::all()->where('busena', '0');
    return view('admin', compact('upload'));
}]);

/* News routes */
Route::get('admin/new-post', ['middleware' => 'admin', 'uses' => 'NewsController@newPost']);

Route::post('admin/new-post/add', 'NewsController@addPost');

Route::get('admin/edit-posts', ['middleware' => 'admin', 'uses' => 'NewsController@showEditPosts']);

Route::get('admin/edit-posts/delete/{id}', ['middleware' => 'admin', 'uses' => 'NewsController@deletePost']);

Route::get('admin/edit-posts/edit/{id}', ['middleware' => 'admin', 'uses' => 'NewsController@editPost']);

Route::post('admin/edit-posts/edit/{id}/submit', ['middleware' => 'admin', 'uses' => 'NewsController@updatePost']);

/* News routes */