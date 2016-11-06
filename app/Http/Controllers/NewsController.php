<?php

namespace App\Http\Controllers;

use App\News;
use DB;
use Auth;
use Input;
use Session;
use Redirect;

class NewsController extends Controller
{

    public function showEditPosts()
    {
        $news = News::with('user')->get()->sortBy('created_at', SORT_DESC, true);

        return view('admin-views/edit-posts', compact('news'));
    }

    public function newPost()
    {
        return view('admin-views/new-post');
    }

    public function addPost()
    {
        $article = new News;
        $article->title = Input::get('title');
        $article->content = Input::get('content');
        $article->added_by = Auth::user()->id;
        $article->save();

        Session::flash('success-message', 'Naujas straipsnis pridėtas');
        return Redirect::back();
    }

    public function deletePost($id)
    {
        $article= News::find($id);

        $article->delete();

        Session::flash('success-message', 'Straipsnis ištrintas');
        return Redirect::back();
    }

    public function editPost($id)
    {
        $article= News::find($id);
        return view('admin-views/edit', compact('article'));
    }

    public function updatePost($id)
    {
        $article= News::find($id);
        $article->title = Input::get('title');
        $article->content = Input::get('content');
        $article->save();

        Session::flash('success-message', 'Straipsnis atnaujintas');
        return Redirect::back();
    }
}

